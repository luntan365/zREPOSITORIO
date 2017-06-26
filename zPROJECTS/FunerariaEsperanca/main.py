# coding: utf-8
import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.floatlayout import FloatLayout
from kivy.lang import Builder
from threading import Thread
from reportlab.pdfgen import canvas
from reportlab.lib.colors import black,white,red,green,blue,gray
from reportlab.lib.colors import HexColor
import os
import webbrowser
from datetime import date
import time

def pdf_paz(numero_contrato, data, valor, numero_parcelas, plano, nome, rua, numero, bairro, cep, municipio, uf):

    vencimento = date(int(data[6:10:]), int(data[3:5:]), int(data[0:2:]))
    nome_arquivo = str(vencimento)+"_"+str(nome)+"_"+str(numero_contrato)+"_"+str(int(time.time()*1000))+".pdf"
    pdf = canvas.Canvas(nome_arquivo)

    x = 48
    y = 780
    largura=250
    altura= 21.2

    header_x = x+20
    header_y = y+7
    footer_x = x+133
    footer_y = y-141

    text_x = x+3
    text_y = y-9

    altura_total = altura * 8
    mody = altura_total + 28
    modx = largura+20

    for idx in range(1,int(numero_parcelas)+1):

        # CARNE
	try:
        	pdf.drawImage("x.jpg",x+28,y-altura*5-21, 190, 130)
	except ValueError:
		pass        
        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setStrokeColor(HexColor("#00ADEF"))
        pdf.rect(x,y,largura,altura,fill=1, stroke=1)
        pdf.rect(x,y-altura*7,largura,altura,fill=1, stroke=1)
        pdf.setStrokeColor(black)
        pdf.rect(x,y-altura,largura,altura)
        pdf.rect(x,y-altura*2,largura,altura)
        pdf.rect(x,y-altura*3,largura,altura)
        pdf.rect(x,y-altura*4,largura,altura)
        pdf.rect(x,y-altura*5,largura,altura)
        pdf.rect(x,y-altura*6,largura,altura)

        # TEXTO TOP BOT
        pdf.setFillColor(white)
        pdf.setFont('Helvetica-BoldOblique', 10)
        pdf.drawString(header_x, header_y, "ASSISTÊNCIA FAMILIAR PAX ESPERANÇA")
        pdf.drawString(footer_x, footer_y, "CARNÊ DO CLIENTE")


        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setFont('Helvetica-Oblique', 8)
        pdf.drawString(text_x, text_y, "Nome")
        pdf.drawString(text_x, text_y-altura, "Nº Contrato")
        pdf.drawString(text_x, text_y-altura*2, "Plano")
        pdf.drawString(text_x, text_y-altura*3, "Rua")
        pdf.drawString(text_x, text_y-altura*4, "Bairro")
        pdf.drawString(text_x, text_y-altura*5, "Município")

        pdf.drawString(text_x+160, text_y-altura*2, "Vencimento")
        pdf.drawString(text_x+135, text_y-altura, "Valor")
        pdf.drawString(text_x+90, text_y-altura*2, "Nº Parcela")
        pdf.drawString(text_x+160, text_y-altura*3, "Número")
        pdf.drawString(text_x+160, text_y-altura*4, "CEP")
        pdf.drawString(text_x+160, text_y-altura*5, "UF")


        pdf.setFillColor(black)
        pdf.setFont('Helvetica', 9)
        pdf.drawString(text_x+10, text_y-9, nome)
        pdf.drawString(text_x+10, text_y-9-altura, numero_contrato)
        pdf.drawString(text_x+10, text_y-9-altura*2, plano)
        pdf.drawString(text_x+10, text_y-9-altura*3, rua)
        pdf.drawString(text_x+10, text_y-9-altura*4, bairro)
        pdf.drawString(text_x+10, text_y-9-altura*5, municipio)
        pdf.drawString(text_x+170, text_y-9-altura*2, str(date.fromordinal(vencimento.toordinal()+(31*idx)).strftime("%d/%m/%Y")))
        pdf.drawString(text_x+140, text_y-9-altura, "R$ "+valor)
        pdf.drawString(text_x+100, text_y-9-altura*2, str(idx))
        pdf.drawString(text_x+170, text_y-9-altura*3, numero)
        pdf.drawString(text_x+170, text_y-9-altura*4, cep)
        pdf.drawString(text_x+170, text_y-9-altura*5, uf)

        # CARNE 02
	try:
        	pdf.drawImage("x.jpg",x+35+modx,y-altura*5-18, 190, 130)
	except ValueError:
		pass
        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setStrokeColor(HexColor("#00ADEF"))
        pdf.rect(x+modx,y,largura,altura,fill=1, stroke=1)
        pdf.rect(x+modx,y-altura*7,largura,altura,fill=1, stroke=1)
        pdf.setStrokeColor(black)
        pdf.rect(x+modx,y-altura,largura,altura)
        pdf.rect(x+modx,y-altura*2,largura,altura)
        pdf.rect(x+modx,y-altura*3,largura,altura)
        pdf.rect(x+modx,y-altura*4,largura,altura)
        pdf.rect(x+modx,y-altura*5,largura,altura)
        pdf.rect(x+modx,y-altura*6,largura,altura)

        # TEXTO TOP BOT
        pdf.setFillColor(white)
        pdf.setFont('Helvetica-BoldOblique', 10)
        pdf.drawString(header_x+modx, header_y, "ASSISTÊNCIA FAMILIAR PAX ESPERANÇA")
        pdf.drawString(footer_x+modx, footer_y, "CARNÊ DO CLIENTE")

        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setFont('Helvetica-Oblique', 8)
        pdf.drawString(text_x+modx, text_y, "Nome")
        pdf.drawString(text_x+modx, text_y-altura, "Nº Contrato")
        pdf.drawString(text_x+modx, text_y-altura*2, "Plano")
        pdf.drawString(text_x+modx, text_y-altura*3, "Rua")
        pdf.drawString(text_x+modx, text_y-altura*4, "Bairro")
        pdf.drawString(text_x+modx, text_y-altura*5, "Município")
        pdf.drawString(text_x+modx+160, text_y-altura*2, "Vencimento")
        pdf.drawString(text_x+modx+135, text_y-altura, "Valor")
        pdf.drawString(text_x+modx+90, text_y-altura*2, "Nº Parcela")
        pdf.drawString(text_x+modx+160, text_y-altura*3, "Número")
        pdf.drawString(text_x+modx+160, text_y-altura*4, "CEP")
        pdf.drawString(text_x+modx+160, text_y-altura*5, "UF")


        pdf.setFillColor(black)
        pdf.setFont('Helvetica', 9)
        pdf.drawString(text_x+modx+10, text_y-9, nome)
        pdf.drawString(text_x+modx+10, text_y-9-altura, numero_contrato)
        pdf.drawString(text_x+modx+10, text_y-9-altura*2, plano)
        pdf.drawString(text_x+modx+10, text_y-9-altura*3, rua)
        pdf.drawString(text_x+modx+10, text_y-9-altura*4, bairro)
        pdf.drawString(text_x+modx+10, text_y-9-altura*5, municipio)
        pdf.drawString(text_x+modx+170, text_y-9-altura*2, str(date.fromordinal(vencimento.toordinal()+(31*idx)).strftime("%d/%m/%Y")))
        pdf.drawString(text_x+modx+140, text_y-9-altura, "R$ "+valor)
        pdf.drawString(text_x+modx+100, text_y-9-altura*2, str(idx))
        pdf.drawString(text_x+modx+170, text_y-9-altura*3, numero)
        pdf.drawString(text_x+modx+170, text_y-9-altura*4, cep)
        pdf.drawString(text_x+modx+170, text_y-9-altura*5, uf)

        y -= mody
        header_y -= mody
        footer_y -= mody
        text_y -= mody

        if (idx%4)==0 or idx==numero_parcelas:
            pdf.showPage()
            x = 48
            y = 780
            header_x = x+20
            header_y = y+7
            footer_x = x+133
            footer_y = y-141
            text_x = x+3
            text_y = y-9
            pass
        pass

    pdf.save()
    webbrowser.open(os.path.abspath(nome_arquivo))
    pass




class Tela(FloatLayout):

    def calc_parc(self):
        try:
            valor = float((self.ids.valor.text).replace(',', '.'))
            juros = float((self.ids.juros.text).replace(',', '.'))
            num_par = int(self.ids.numero_parcelas.text)
            val_par = "%.2f"%((valor+valor*juros/100)/num_par)
            self.ids.valor_parcela.text = val_par
        except Exception as e:
            pass
        pass

    def gerar_pdf(self):
        numero_contrato = self.ids.numero_contrato.text
        data = self.ids.data.text
        valor = (self.ids.valor_parcela.text).replace(',', '.')
        numero_parcelas = self.ids.numero_parcelas.text
        plano = self.ids.plano.text
        nome = self.ids.nome.text
        rua = self.ids.rua.text
        numero = self.ids.numero.text
        bairro = self.ids.bairro.text
        cep = self.ids.cep.text
        municipio = self.ids.municipio.text
        uf = self.ids.uf.text
        Thread(target=pdf_paz, args=(numero_contrato, data, valor, numero_parcelas, plano, nome, rua, numero, bairro, cep, municipio, uf)).start()
        pass

codigo = """
#:import data datetime

<Tela@FloatLayout>:
    Label:
        text: 'Data'
        # text_size: self.size
        # halign: 'right'
        # valign: 'middle
        size_hint: .5, .06
        pos_hint: {"x":0, "top":1}
    Label:
        text: 'Tipo Plano'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.94}
    Label:
        text: 'Numero do Contrato'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.88}
    Label:
        text: 'Valor'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.82}
    Label:
        text: 'Numero Parcelas'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.76}
    Label:
        text: 'Porcentagem de Juros'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.70}
    Label:
        text: 'Valor da Parcela'
        readonly: True
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.64}
    Label:
        text: 'Nome'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.58}
    Label:
        text: 'Rua'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.52}
    Label:
        text: 'Numero'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.46}
    Label:
        text: 'Bairro'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.40}
    Label:
        text: 'CEP'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.34}
    Label:
        text: 'Municipio'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.28}
    Label:
        text: 'UF'
        size_hint: .5, .06
        pos_hint: {"x":0, "top":0.22}
    Button:
        text: 'GERAR PDF'
        size_hint: 1, .16
        pos_hint: {"x":0, "top":0.16}
        on_release: root.gerar_pdf()

    TextInput:
        id: data
        text: data.date.today().strftime("%d-%m-%Y")
        focus: True
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":1}
        padding: 10
    TextInput:
        id: plano
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.94}
        padding: 10
    TextInput:
        id: numero_contrato
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.88}
        padding: 10
    TextInput:
        id: valor
        on_text:root.calc_parc()
        write_tab: False
        multiline: False
        text: '0'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.82}
        padding: 10
    TextInput:
        id: numero_parcelas
        on_text:root.calc_parc()
        write_tab: False
        multiline: False
        text: '12'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.76}
        padding: 10
    TextInput:
        id: juros
        on_text:root.calc_parc()
        write_tab: False
        multiline: False
        text: '0'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.70}
        padding: 10
    Label:
        id: valor_parcela
        write_tab: False
        multiline: False
        text: '0'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.64}
    TextInput:
        id: nome
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.58}
        padding: 10
    TextInput:
        id: rua
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.52}
        padding: 10
    TextInput:
        id: numero
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.46}
        padding: 10
    TextInput:
        id: bairro
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.40}
        padding: 10
    TextInput:
        id: cep
        write_tab: False
        multiline: False
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.34}
        padding: 10
    TextInput:
        id: municipio
        write_tab: False
        multiline: False
        text: 'Quixada'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.28}
        padding: 10
    TextInput:
        id: uf
        write_tab: False
        multiline: False
        text: 'CE'
        size_hint: .5, .06
        pos_hint: {"x":.5, "top":0.22}
        padding: 10

Tela:
"""
class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

JanelaApp().run()
