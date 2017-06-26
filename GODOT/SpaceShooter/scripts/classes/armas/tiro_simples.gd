var pre_tiro = preload("res://scenes/tiro.tscn")
var intervalo_tiro = 0.3
var ultimo_disparo = 0
var nave
func _init(nave):
	self.nave = nave
	pass

func dispara(delta):
	if ultimo_disparo > 0:
		ultimo_disparo -= delta
	else:
		criar_tiro(nave.get_node("canhaoCentral"))
		ultimo_disparo = intervalo_tiro
	pass

func criar_tiro(node):
	var tiro = pre_tiro.instance()
	tiro.set_global_pos(node.get_global_pos())
	nave.get_owner().add_child(tiro) #pega o pai e adciona um filho
	pass
