class Entidade(object):
    # Entidade basica.
    def __init__(self, nivel=1, forca=1, destreza=1, inteligencia=1, agilidade=1, vitalidade=1, espirito=1):
        super(Entidade, self).__init__()
        
        # Atributos Basico
        self.nivel = nivel
        self.forca = forca
        self.destreza = destreza
        self.inteligencia = inteligencia
        self.agilidade = agilidade
        self.vitalidade = vitalidade
        self.espirito = espirito
        
        # Atributos Secundarios        
        self.hp = 10
        self.sp = 10
        self.precisao = 0
        self.esquica = 0
        self.ataque_min = 1
        self.ataque_max_cac = 1
        self.ataque_max_ads = 1
        self.ataque_max_mgc = 1
        self.defesa_fixa = 0
        self.defesa_voluvel = 0
        self.defesa_mgc_fixa = 0
        self.defesa_mgc_voluvel = 0
        self.velocidade_ataque = 1
        self.velocidade_conjuracao = 1
        self.resistencia_fisica = 0
        self.resistencia_magica = 0
        pass

        
    def calcular_atributos(self):
        self.hp = 10 + self.forca + self.vitalidade * 4
        self.sp = 10 + self.inteligencia + self.espirito * 4
        self.precisao = self.destreza
        self.esquica = self.agilidade
        self.ataque_fixo = self.destreza
        self.ataque_voluvel_cac = self.forca * 3
        self.ataque_voluvel_ads = self.destreza * 2
        self.ataque_voluvel_mgc = self.espirito + self.inteligencia * 2
        # self.defesa_fixa = 0
        self.defesa_voluvel = self.vitalidade
        # self.defesa_mgc_fixa = 0
        self.defesa_mgc_voluvel = self.espirito
        self.velocidade_ataque = self.destreza + self.forca + self.agilidade * 2
        self.velocidade_conjuracao = self.inteligencia + self.espirito + self.destreza * 2
        self.resistencia_fisica = self.forca + self.vitalidade * 2
        self.resistencia_magica = self.inteligencia + self.espirito * 2
        pass
