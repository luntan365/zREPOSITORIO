var = "elsif"

#===================================
# SE FOR VERDADEIRO
if "if" == var
  puts "if"
elsif "elsif" == var
  puts "elsif"
else
  puts "else"
end

#===================================
# SE NÃO FOR VERDADEIRO
unless "unless" == var
  puts "unless"
else
  puts "else"
end

#===================================
# CASE
$idade =  15
case $idade
when 0 .. 2
   puts "0 .. 2"
when 3 .. 6
   puts "3 .. 6"
when 7 .. 12
   puts "7 .. 12"
when 13 .. 18
   puts "13 .. 18"
else
   puts "nenhuma das opções"
end
