class kivy.core.text.LabelBase(
text='', #texto
font_size=12, #tamnho fonta
font_name=None, #nome da fonte
bold=False, #negrito
italic=False, #italico
underline=False,  #sublinado
strikethrough=False, 
halign=’left’, #padrão é “left” Alinhamento horizontal
valign=’bottom’, #padrão é “bottom” Alinhamento vertical do texto
shorten=False, 
text_size=None,
mipmap=False, 
color=None, 
line_height=1.0,
strip=False, 
strip_reflow=True, #tentar reduzir o texto caber label
shorten_from=’center’,  #quanbdo texto e reduzido centralize
split_str=' ', #padrão é ' ' sequência de caracteres usado para dividir as palavras 
unicode_errors=’replace’, #padrão é ‘replace’Como lidar com erros de decodificação Unicode. Pode ser ‘strict’, ‘replace’ ou ‘ignore’.
font_hinting=’normal’,
font_kerning=True, 
font_blended=True,
outline_width=None, #padrão é None Largura em pixels do contorno.
outline_color=None, #padrão é (0, 0, 0) Cor do contorno
**kwargs)

padding: 10, 10 = padding_x e padding_y
padding_x: 10, esquerda e direita
padding_y: 10, cima e baixo
