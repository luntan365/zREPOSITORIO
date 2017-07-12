
kvlang = """
#:import Clipboard kivy.core.clipboard.Clipboard
Button:
    on_release:
        self.text = Clipboard.paste()
        Clipboard.copy('Data')
"""
