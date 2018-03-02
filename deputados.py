
import pandas as pd
import matplotlib.pyplot as plt



train_dataset = pd.read_csv('candidatos_deputados_2014_final.csv', encoding='latin-1')

tabela = pd.pivot_table(data=train_dataset, values='NOME_CANDIDATO', index='CODIGO_SEXO', columns='DESC_SIT_TOT_TURNO', aggfunc='count')

# HOMENS E MULHERES  ELEITAS	
plt.title('HOMENS E MULHERES ELEITAS', fontsize=20)
acm_masc=tabela['ELEITO POR MÉDIA'][2]+tabela['ELEITO POR QP'][2]+tabela['SUPLENTE'][2]
acm_fem=tabela['ELEITO POR MÉDIA'][4]+tabela['ELEITO POR QP'][4]+tabela['SUPLENTE'][4]
y_axis = [acm_masc,acm_fem]
x_axis = range(len(y_axis))
width_n = .9
bar_color = 'yellow'
bar_color2 = 'red'
plt.bar(x_axis, y_axis, width=width_n, color=[bar_color,bar_color2])
plt.show()



# HOMENS E MULHERES NAO ELEITAS	
plt.title('HOMENS E MULHERES NAO ELEITAS', fontsize=20)
y_axis = [tabela['NÃO ELEITO'][2],tabela['NÃO ELEITO'][4]]
x_axis = range(len(y_axis))
width_n = .9
bar_color = 'yellow'
bar_color2 = 'red'
plt.bar(x_axis, y_axis, width=width_n, color=[bar_color,bar_color2])
plt.show()



    


#quero saber quais partidos elejeram mais candidatos
tabela = pd.pivot_table(data=train_dataset, values='NOME_CANDIDATO', index='CODIGO_SEXO', columns='NUMERO_PARTIDO', aggfunc='count')
print(tabela)



#histograma da idade de todos os candidatos eleitos
plt.title('Idade dos candidatos eleitos por QP', fontsize=20)
a = train_dataset.loc[train_dataset['DESC_SIT_TOT_TURNO'] == 'ELEITO POR QP']# colocar && train_dataset['sexo'] == 'masc e fem']
histogram_example = plt.hist(a['IDADE_DATA_ELEICAO'], bins=15)
plt.show()


#histograma da idade de todos os candidatos eleitos por media
plt.title('Idade dos candidatos eleitos por ELEITO POR MÉDIA', fontsize=20)
a = train_dataset.loc[train_dataset['DESC_SIT_TOT_TURNO'] == 'ELEITO POR MÉDIA']
histogram_example = plt.hist(a['IDADE_DATA_ELEICAO'], bins=15)
plt.show()

#histograma da idade de todos os candidatos eleitos por media
plt.title('Idade dos candidatos SUPLENTES', fontsize=20)
a = train_dataset.loc[train_dataset['DESC_SIT_TOT_TURNO'] == 'SUPLENTE']
histogram_example = plt.hist(a['IDADE_DATA_ELEICAO'], bins=15)
plt.show()


#histograma da idade de todos os candidatos eleitos 
plt.title('Idade dos candidatos eleitos ', fontsize=20)
a = train_dataset.loc[train_dataset['DESC_SIT_TOT_TURNO'] != 'NÃO ELEITO']
histogram_example = plt.hist(a['IDADE_DATA_ELEICAO'], bins=15)
plt.show()


#histograma da idade de todos os candidatos nao eleitos
plt.title('Idade dos candidatos não eleitos', fontsize=20)
a = train_dataset.loc[train_dataset['DESC_SIT_TOT_TURNO'] == 'NÃO ELEITO']
histogram_example = plt.hist(a['IDADE_DATA_ELEICAO'], bins=15)
plt.show()





#acm_masc=tabela[''][2]+tabela[''][2]+tabela['SUPLENTE'][2]
#train_dataset['IDADE_DATA_ELEICAO'].fillna(train_dataset['IDADE_DATA_ELEICAO'].mean(), inplace=True)







'''




está pronto


'''
#print(a)







'''

SIGLA_UF,CODIGO_CARGO,DESCRICAO_CARGO,NOME_CANDIDATO,SEQUENCIAL_CANDIDATO,
COD_SITUACAO_CANDIDATURA,DES_SITUACAO_CANDIDATURA,NUMERO_PARTIDO,CODIGO_LEGENDA,
CODIGO_OCUPACAO,DESCRICAO_OCUPACAO,IDADE_DATA_ELEICAO,CODIGO_SEXO,DESCRICAO_SEXO,
COD_GRAU_INSTRUCAO,DESCRICAO_GRAU_INSTRUCAO,CODIGO_ESTADO_CIVIL,DESCRICAO_ESTADO_CIVIL,
CODIGO_COR_RACA,DESCRICAO_COR_RACA,CODIGO_NACIONALIDADE,DESCRICAO_NACIONALIDADE,
DESPESA_MAX_CAMPANHA,COD_SIT_TOT_TURNO,DESC_SIT_TOT_TURNO,VALOR_BEM,SETOR_A,SETOR_B,
SETOR_C,SETOR_D,SETOR_E,SETOR_F,SETOR_G,SETOR_H,SETOR_I,SETOR_J,SETOR_K,SETOR_L,SETOR_M,
SETOR_N,SETOR_O,SETOR_P,SETOR_Q,SETOR_R,SETOR_S,SETOR_NAO_IDENTIFICADO,TP_RECEITA_APLICACAO,
TP_RECEITA_EVENTO,TP_RECEITA_FISICA,TP_RECEITA_INTERNET,TP_RECEITA_JURIDICA,
TP_RECEITA_NAO_IDENTIFICADA,TP_RECEITA_OUTRO,TP_RECEITA_PARTIDO,TP_RECEITA_PROPRIO,VALOR_RECEITA

AC,7,DEPUTADO ESTADUAL,BENEDITO SILVA BARBOSA,10000000504,2,DEFERIDO,23,10000000034,266,PROFESSOR DE ENSINO MÉDIO,
46,2,MASCULINO,8,SUPERIOR COMPLETO,9,DIVORCIADO(A),3,PARDA,1,BRASILEIRA NATA,1000000,5,SUPLENTE,210000.0,0.0,0.0,0.0,
0.0,0.0,490.5,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,200.0,1500.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,690.5,1500.0,2190.5







train_dataset['IDADE_DATA_ELEICAO'].fillna(train_dataset['IDADE_DATA_ELEICAO'].mean(), inplace=True)


histogram_example = plt.hist(train_dataset['IDADE_DATA_ELEICAO'], bins=15)
plt.show()


#histograma da idade de todos os candidatos
train_dataset['IDADE_DATA_ELEICAO'].fillna(train_dataset['IDADE_DATA_ELEICAO'].mean(), inplace=True)
histogram_example = plt.hist(train_dataset['IDADE_DATA_ELEICAO'], bins=15)
plt.show()

'''

#histograma da idade dos candidatos eleitos DESC_SIT_TOT_TURNO=ELEITO

#histograma da idade dos candidatos n eleitos






#desvio padrão (margen de erro)  .std()

# histograma das idades dos candidatos eleitos

#



#histograma dos valores gastos pelas campanhas dos candidatos eleitos
#train_dataset.loc[(train_dataset["DES_SITUACAO_CANDIDATURA"]=="DEFERIDO") & (train_dataset["TP_RECEITA_JURIDICA"]!=8),["DES_SITUACAO_CANDIDATURA","TP_RECEITA_JURIDICA"]]

#quero ver todos os candidatos deferidos por partido e em um histograma
#train_dataset.loc[(train_dataset[“DES_SITUACAO_CANDIDATURA”]==”DEFERIDO”) & (train_dataset[“IDADE_DATA_ELEICAO”]==””), [“Gender”,”Education”]

#print(train_dataset.head())
