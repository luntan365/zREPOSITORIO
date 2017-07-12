
kivy.parser.parse_color('rgb(0, 0, 0)') #converter string para cor
# Hexadecimal = #rgb, #rgba, #rrggbb, #rrggbbaa
# RGB = rgb(r, g, b), rgba(r, g, b, a), rgb, rgba, rrggbb, rrggbbaa

parse_int(text)
parse_float(text)
parse_string(text)
parse_bool(text)

parse_int2("12 54") = 12, 54
parse_float4('54 87. 35 0') = 54, 87., 35, 0

parse_filename(filename) #Analisa uma nome de arquivo e busca por ele usando resource_find()
