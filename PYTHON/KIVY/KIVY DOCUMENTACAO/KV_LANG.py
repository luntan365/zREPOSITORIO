<MyWidget>:

    Button:
        id: btn1        
    Button:
        text: 'The state of the other button is %s' %btn1.state
        
    Button:
        text: str(self.state)
        
    Button:
        text: 'Plop world' if self.state == 'normal' else 'Release me!'

        
#=================================================================

Widget:
    <Button>:
        canvas:
            Color:
                rgb: (1, 1, 1)
            Rectangle:
                size: self.size
                pos: self.pos
            Rectangle:
                pos: self.pos
                size: self.texture_size
                texture: self.texture

#=================================================================


#=================================================================

#:import os os
<Rule>:
    Button:
        text: os.getcwd()


#:import ut kivy.utils
<Rule>:
    canvas:
        Color:
            rgba: ut.get_random_color()


#: import Animation kivy.animation.Animation
<Rule>:
    on_prop: Animation(x=.5).start(self)


#:set my_color (.4, .3, .4)
#:set my_color_hl (.5, .4, .5)
<Rule>:
    state: 'normal'
    canvas:
        Color:
            rgb: my_color if self.state == 'normal' else my_color_hl
            
    
#=================================================================

# Test.kv
#:include mycomponent.kv
#:include force mybutton.kv
<Rule>:
    state: 'normal'
    MyButton:
    MyComponent:   
    
#=================================================================


#=================================================================
