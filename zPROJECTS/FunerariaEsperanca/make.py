from reportlab.pdfgen import canvas
from reportlab.lib.colors import black,white,red,green,blue,gray
from reportlab.lib.colors import HexColor
from os import startfile
from datetime import date

def pdf_paz(numero_contrato, data, valor, numero_parcelas, plano, nome, rua, numero, bairro, cep, municipio, uf):

    vencimento = date(int(data[6:10:]), int(data[3:5:]), int(data[0:2:]))
    nome_arquivo = str(vencimento)+"_"+str(nome)+"_"+str(numero_contrato)+".pdf"
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
        pdf.drawImage("x.jpg",x+35,y-altura*5-18, 190, 130)
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
        pdf.drawString(header_x, header_y, "ASSISTÊNCIA FAMILIAR PAZ ESPERANÇA")
        pdf.drawString(footer_x, footer_y, "CARNÊ DO CLIENTE")


        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setFont('Helvetica-Oblique', 8)
        pdf.drawString(text_x, text_y, "Nome")
        pdf.drawString(text_x, text_y-altura, "Nº Contrato")
        pdf.drawString(text_x, text_y-altura*2, "Plano")
        pdf.drawString(text_x, text_y-altura*3, "Rua")
        pdf.drawString(text_x, text_y-altura*4, "Bairro")
        pdf.drawString(text_x, text_y-altura*5, "Município")
        pdf.drawString(text_x+135, text_y, "Vencimento")
        pdf.drawString(text_x+135, text_y-altura, "Valor")
        pdf.drawString(text_x+135, text_y-altura*2, "Nº Parcela")
        pdf.drawString(text_x+135, text_y-altura*3, "Número")
        pdf.drawString(text_x+135, text_y-altura*4, "CEP")
        pdf.drawString(text_x+135, text_y-altura*5, "UF")


        pdf.setFillColor(black)
        pdf.setFont('Helvetica', 9)
        pdf.drawString(text_x+2, text_y-9, nome)
        pdf.drawString(text_x+2, text_y-9-altura, numero_contrato)
        pdf.drawString(text_x+2, text_y-9-altura*2, plano)
        pdf.drawString(text_x+2, text_y-9-altura*3, rua)
        pdf.drawString(text_x+2, text_y-9-altura*4, bairro)
        pdf.drawString(text_x+2, text_y-9-altura*5, municipio)
        pdf.drawString(text_x+140, text_y-9, str(date.fromordinal(vencimento.toordinal()+(31*idx)).strftime("%d/%m/%Y")))
        pdf.drawString(text_x+140, text_y-9-altura, "R$ "+valor)
        pdf.drawString(text_x+140, text_y-9-altura*2, str(idx))
        pdf.drawString(text_x+140, text_y-9-altura*3, numero)
        pdf.drawString(text_x+140, text_y-9-altura*4, cep)
        pdf.drawString(text_x+140, text_y-9-altura*5, uf)

        # CARNE 02
        pdf.drawImage("x.jpg",x+35+modx,y-altura*5-18, 190, 130)
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
        pdf.drawString(header_x+modx, header_y, "ASSISTÊNCIA FAMILIAR PAZ ESPERANÇA")
        pdf.drawString(footer_x+modx, footer_y, "CARNÊ DO CLIENTE")

        pdf.setFillColor(HexColor("#00ADEF"))
        pdf.setFont('Helvetica-Oblique', 8)
        pdf.drawString(text_x+modx, text_y, "Nome")
        pdf.drawString(text_x+modx, text_y-altura, "Nº Contrato")
        pdf.drawString(text_x+modx, text_y-altura*2, "Plano")
        pdf.drawString(text_x+modx, text_y-altura*3, "Rua")
        pdf.drawString(text_x+modx, text_y-altura*4, "Bairro")
        pdf.drawString(text_x+modx, text_y-altura*5, "Município")
        pdf.drawString(text_x+modx+135, text_y, "Vencimento")
        pdf.drawString(text_x+modx+135, text_y-altura, "Valor")
        pdf.drawString(text_x+modx+135, text_y-altura*2, "Nº Parcela")
        pdf.drawString(text_x+modx+135, text_y-altura*3, "Número")
        pdf.drawString(text_x+modx+135, text_y-altura*4, "CEP")
        pdf.drawString(text_x+modx+135, text_y-altura*5, "UF")


        pdf.setFillColor(black)
        pdf.setFont('Helvetica', 9)
        pdf.drawString(text_x+modx+2, text_y-9, nome)
        pdf.drawString(text_x+modx+2, text_y-9-altura, numero_contrato)
        pdf.drawString(text_x+modx+2, text_y-9-altura*2, plano)
        pdf.drawString(text_x+modx+2, text_y-9-altura*3, rua)
        pdf.drawString(text_x+modx+2, text_y-9-altura*4, bairro)
        pdf.drawString(text_x+modx+2, text_y-9-altura*5, municipio)
        pdf.drawString(text_x+modx+140, text_y-9, str(date.fromordinal(vencimento.toordinal()+(31*idx)).strftime("%d/%m/%Y")))
        pdf.drawString(text_x+modx+140, text_y-9-altura, "R$ "+valor)
        pdf.drawString(text_x+modx+140, text_y-9-altura*2, str(idx))
        pdf.drawString(text_x+modx+140, text_y-9-altura*3, numero)
        pdf.drawString(text_x+modx+140, text_y-9-altura*4, cep)
        pdf.drawString(text_x+modx+140, text_y-9-altura*5, uf)

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
    startfile(nome_arquivo)
    pass

