class Personagem(Entidade):
    # Personagem
    def __init__(self, nivel=1, forca=1, destreza=1, inteligencia=1, agilidade=1, vitalidade=1, espirito=1, cabeca=None, torso=None, bracos=None, pernas=None, mao_direita=None, mao_esquerda=None):
        super(Personagem, self).__init__(nivel, forca, destreza, inteligencia, agilidade, vitalidade, espirito)
        self.cabeca = cabeca
        self.torso = torso
        self.bracos = bracos
        self.pernas = pernas
        self.cabeca = mao_direita
        self.cabeca = mao_esquerda
        
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
