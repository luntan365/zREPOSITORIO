extends Node

const GRUPO_INIMIGO = "inimigos"
const GRUPO_NAVE = "nave"
var vel_meteoro = 200

var life = 3 setget setVida, getVida #encapsulamento
signal life_atualizar

func setVida(valor):
	life = valor
	emit_signal("life_atualizar")
	
func getVida ():
	return life

signal score_atualizar
var score = 0 setget setScore, getScore #encapsulamento

func setScore(valor):
	score = valor
	emit_signal("score_atualizar")
	
func getScore ():
	return score





func _ready():
	randomize()
	pass

func getCamera():
	return get_tree().get_root().get_node("main").get_node("camera")
	pass