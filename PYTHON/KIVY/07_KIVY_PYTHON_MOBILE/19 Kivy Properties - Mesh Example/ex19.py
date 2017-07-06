from kivy.uix.relativelayout import RelativeLayout
from kivy.app import App
from kivy.properties import NumericProperty, ListProperty

class Ex19(RelativeLayout):
    num = NumericProperty(0)
    vert = ListProperty()
    pts = ListProperty()
    def on_num(self,*args):
        self.vert = []
        self.pts = []
        def addPoint(x,y):
            self.vert.extend([x,y,0,0])
            self.pts.extend([x,y])
            
        if self.num>0: addPoint(400,300) # Common pt.
        if self.num>1: addPoint(300,500) # Upper triangle 1
        if self.num>2: addPoint(500,500) # Upper triangle 2
        if self.num>3: addPoint(600,400) # Right triangle 1
        if self.num>4: addPoint(600,200) # Right triangle 2
        if self.num>5: addPoint(500,100) # Down triangle 1
        if self.num>6: addPoint(300,100) # Down triangle 2
        if self.num>7: addPoint(200,200) # Left triangle 1
        if self.num>8: addPoint(200,400) # Left triangle 2
        if self.num>9: addPoint(300,500) # Back to Upper
       
class Ex19App(App):
    def build(self):
        self.title="Mesh example"
        return Ex19()

if __name__=='__main__':
    Ex19App().run()
