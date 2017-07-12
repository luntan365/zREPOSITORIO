# sp = Recomendado para font - sem escalonamento
# dp = pixels escalonado da densidade da tela - responisve
# mm = Milimetro
# cm = Centimento
# IN - Polegadas


#Aqui está um exemplo de criação de um Label com sp sp_size e a definição da altura manualmente com uma margem de 10dp:
<MyWidget>:
    Label:
        text: 'Hello world'
        font_size: '15sp'
        size_hint_y: None
        height: self.texture_size[1] + dp(10)
