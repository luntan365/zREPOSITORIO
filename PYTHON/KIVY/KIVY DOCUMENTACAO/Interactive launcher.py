from kivy.interactive import InteractiveLauncher
from kivy.app import App
from kivy.uix.button import Button

class MyApp(App): 
    def build(self):
        return Button(text='Hello Shell')
        
launcher = InteractiveLauncher(MyApp())
launcher.run()

# ================================================
from kivy.interactive import SafeMembrane
interactiveLauncher.attribute = myNewObject
# myNewObject is unsafe
myNewObject = SafeMembrane(myNewObject)
# myNewObject is now safe. Call at will.
myNewObject.method()
SafeMembrane.safeIn() #fará com que o aplicativo seja pausado
SafeMembrane.safeOut() #permitirá a um aplicativo pausado continuar
