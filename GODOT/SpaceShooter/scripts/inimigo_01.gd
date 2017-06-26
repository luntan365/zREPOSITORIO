extends Area2D


func _ready():
	get_node("sprite").set_texture(recursos.random_textura_inimigo())
	pass
