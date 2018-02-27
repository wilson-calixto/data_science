import pandas as pd
import numpy as np
import matplotlib.pyplot as plt

names1880 = pd.read_csv('names/yob1880.txt', names=['name', 'sex', 'births'])

#soma dos nascimentos
print(names1880.groupby('sex').births.sum())
print()

#print em colunas
years = range(1880, 2011)
pieces = []
columns = ['name', 'sex', 'births']

for year in years:
    path = 'names/yob%d.txt' % year
    frame = pd.read_csv(path, names=columns)
    frame['year'] = year
    pieces.append(frame)
    
names = pd.concat(pieces, ignore_index=True)

print(names)
print()
#agregar dados do ano e sexo
total_births = names.pivot_table('births', 'year', 'sex', aggfunc=sum)
total_births.tail()
total_births.plot(title='Total births by sex and year')

print(total_births)
print()

def add_prop(group):
    births = group.births.astype(float)
    group['prop'] = births / births.sum()
    return group

names = names.groupby(['year', 'sex']).apply(add_prop)

np.allclose(names.groupby(['year', 'sex']).prop.sum(), 1) 

def get_top1000(group):
    return group.sort_index(by='births', ascending=False)[:1000]

grouped = names.groupby(['year', 'sex'])
top1000 = grouped.apply(get_top1000)

pieces = []
for year, group in names.groupby(['year', 'sex']):
    pieces.append(group.sort_index(by='births', ascending=False)[:1000])
    
top1000 = pd.concat(pieces, ignore_index=True) 

#analyzing naming trends

boys = top1000[top1000.sex == 'M']
girls = top1000[top1000.sex == 'F']

total_births = top1000.pivot_table('births', 'year', 'name', aggfunc=sum)

subset = total_births[['John', 'Harry', 'Mary', 'Marilyn']]
subset = subset.plot(subplots=True, figsize=(12, 10), grid=False, title="Number of births per year")

#Measuring the increase in naming diversity

table = top1000.pivot_table('prop', 'year', 'sex', aggfunc=sum)
table = table.plot(title='Sum of table1000.prop by year and sex', yticks=np.linspace(0, 1.2, 13), xticks=range(1880, 2020, 10))

df = boys[boys.year == 2010]

prop_cumsum = df.sort_index(by='prop', ascending=False).prop.cumsum()
prop_cumsum = prop_cumsum[:10]

prop_cumsum = prop_cumsum.searchsorted(0.5)

df = boys[boys.year == 1900]
in1900 = df.sort_index(by='prop', ascending=False).prop.cumsum()
in1900 = in1900.searchsorted(0.5) + 1 

def get_quantile_count(group, q=0.5):
    group = group.sort_index(by='prop', ascending=False)
    return group.prop.cumsum().searchsorted(q) + 1

diversity = top1000.groupby(['year', 'sex']).apply(get_quantile_count)
diversity = diversity.unstack('sex')

diversity = diversity.head()

#The “Last letter” Revolution

get_last_letter = lambda x: x[-1]
last_letters = names.name.map(get_last_letter)
last_letters.name = 'last_letter'
table = names.pivot_table('births', last_letters, ['sex', 'year'], aggfunc=sum)

subtable = table.reindex(columns=[1910, 1960, 2010], level='year')
subtable = subtable.head()
subtable = subtable.sum()

letter_prop = subtable / subtable.sum().astype(float)

fig, axes = plt.subplots(2, 1, figsize=(10, 8))
letter_prop['M'].plot(kind='bar', rot=0, ax=axes[0], title='Male')
letter_prop['F'].plot(kind='bar', rot=0, ax=axes[1], title='Female', legend=False)

letter_prop = table / table.sum().astype(float)
dny_ts = letter_prop.ix[['d', 'n', 'y'], 'M'].T
dny_ts = dny_ts.head()

dny_ts = dny_ts.plot()

#Boy names that became girl names (and vice versa)
all_names = top1000.name.unique()
mask = np.array(['lesl' in x.lower() for x in all_names])
lesley_like = all_names[mask]

filtered = top1000[top1000.name.isin(lesley_like)]
filtered.groupby('name').births.sum()

table = filtered.pivot_table('births', 'year', 'sex', aggfunc='sum')
table.div(table.sum(1), axis=0)
table.tail()

table.plot(style={'M': 'k-', 'F': 'k--'})


print(table)

