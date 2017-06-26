extends Node

var paths = []
const PATH_DIR = "res://path/"

var texturas_inimigo = []
const INIMIGO_TEXTURA_DIRETORIO = "res://sprites/Enemies/"

func _ready():
	carrega_path()
	carrega_texturas_inimigo()
	pass

func carrega_path():
	var diretorio = Directory.new()
	diretorio.change_dir(PATH_DIR)
	diretorio.list_dir_begin()
	
	var path_file = diretorio.get_next()
	while path_file != "":
		if path_file != "." && path_file != "..":
			var path = load(PATH_DIR+path_file)
			if path && path extends Curve2D:
				paths.append(path)
		path_file = diretorio.get_next()
	pass

func random_path():
	return paths[randi() % paths.size()]
	pass

func carrega_texturas_inimigo():
	var dir = Directory.new()
	dir.change_dir(INIMIGO_TEXTURA_DIRETORIO)
	dir.list_dir_begin()
	
	var file = dir.get_next()
	while file != "":
		if file != "." && file != "..":
			var textura = load(INIMIGO_TEXTURA_DIRETORIO+file)
			if textura && textura extends Texture:
				texturas_inimigo.append(textura)
		file = dir.get_next()
	pass

func random_textura_inimigo():
	return texturas_inimigo[randi() % texturas_inimigo.size()]
	pass