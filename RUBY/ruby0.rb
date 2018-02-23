# COMENTARIO
#===================================
# SAIDA DE DADOS
puts "Digite um texto."
# ENTRADA DE DADOS
texto = gets
# SAIDA DE DADOS
puts "texto que vc digitou foi: "+texto

#===================================
# SAIDA DE DADOS
puts "Digite um texto."
# chomp = REMOVER \N (QUEBRA DE LINHA) DA STRING
texto = gets.chomp
# inspect = MOSTRA \N (QUEBRA DE LINHA) DA STRING
puts "texto que vc digitou foi: "+texto.inspect

#===================================
# VARIAVEIS
inteiro = 123
flutuante = 12.34
string = "string"
booleano = true

#===================================
# CONVERSAO
varivavel = 1
convertido = varivavel.to_s # String
puts "Varivavel convertido para "+convertido.class.to_s
convertido = varivavel.to_i # Int
puts "Varivavel convertido para "+convertido.class.to_s
convertido = varivavel.to_f # Float
puts "Varivavel convertido para "+convertido.class.to_s
