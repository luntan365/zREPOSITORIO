#encoding: utf-8
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.factory import Factory
from kivy.properties import ObjectProperty
from kivy.uix.popup import Popup
import xlwt
from datetime import datetime

class SaveDialog(FloatLayout):
    save = ObjectProperty(None)
    text_input = ObjectProperty(None)
    cancel = ObjectProperty(None)

class Root(FloatLayout):
    savefile = ObjectProperty(None)

    def gerar_excel(self, path, file_name):
        wb = xlwt.Workbook()
        ws = wb.add_sheet('Arquivo Excel')
        ws.write(0, 0, 1)
        ws.write(0, 1, 1)
        ws.write(0, 2, xlwt.Formula("A1+B1"))
        if not(path[-1] == '/' or path[-1] == '\\'):
            path = path + '/'
        d = datetime.now()
        data = str(d.day)+'-'+str(d.month)+'-'+str(d.year)+'_'+str(d.hour)+'-'+str(d.minute)+'-'+str(d.second)
        path_full = path + file_name + "_"+ data +".xls"
        wb.save(path_full)
        pass

    def dismiss_popup(self):
        self._popup.dismiss()

    def show_save(self):
        content = SaveDialog(save=self.save, cancel=self.dismiss_popup)
        self._popup = Popup(title="Savar Arquivo", content=content, size_hint=(1, 1))
        self._popup.open()

    def save(self, path, filename):
        self.gerar_excel(path, filename)
        self.dismiss_popup()

class SaveExcel(App):
    pass

Factory.register('Root', cls=Root)
Factory.register('SaveDialog', cls=SaveDialog)


if __name__ == '__main__':
    SaveExcel().run()
