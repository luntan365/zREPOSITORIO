from kivy.uix.checkbox import CheckBox

def on_checkbox_active(checkbox, value):
    if value:
        print('The checkbox', checkbox, 'is active')
    else:
        print('The checkbox', checkbox, 'is inactive')
        
checkbox = CheckBox()
checkbox.bind(active=on_checkbox_active)

active - indica se esta ativo
background_checkbox_disabled_down = 'atlas://data/images/defaulttheme/checkbox_disabled_on'
background_checkbox_disabled_normal = 'atlas://data/images/defaulttheme/checkbox_disabled_off'
background_checkbox_down = 'atlas://data/images/defaulttheme/checkbox_on'
background_checkbox_normal = 'atlas://data/images/defaulttheme/checkbox_off'
background_radio_disabled_down = 'atlas://data/images/defaulttheme/checkbox_radio_disabled_on'
background_radio_disabled_normal = 'atlas://data/images/defaulttheme/checkbox_radio_disabled_off'
background_radio_down = 'atlas://data/images/defaulttheme/checkbox_radio_on'
background_radio_normal = 'atlas://data/images/defaulttheme/checkbox_radio_off'
color = [1, 1, 1, 1]
