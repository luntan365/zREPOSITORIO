   M S B A M L   `   `   `  ����I  EDejotaDuelGame, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null'clr-namespace:DejotaGame
DejotaGame  5   	       DejotaGame.JanelaCombate   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   *localclr-namespace:DejotaGame     5   	   -   5          �Name$  JanelaDeCombate��5   	    � Title$ Janela de Combate��5   	   $��383.898��6#   $	��525��64    � WindowStartupLocation$ CenterScreen=�6@    � 
ResizeMode$ NoResize=�6e   .��5	      � $��1,0,-1,0q�6    � RowDefinitions 5
   
   �� 5      $	��13* �6   �� 5      $	��58* �6    � ColumnDefinitions 5   
   �� 5      $
��169* �6   �� 5      $
��178* �6   �� 5      $
��172* �6   .+�5   
   �� -   5         ��Name$ image_char01Combate��5      $
��Left=�6-   $	��280��6H   $��	10,63,0,0q�6U   $	��Top=�6h   $	��175��6�   $
��Fill=�6�   $��2��6�   $��2��6�   �� 5   
   -   5        $ image_char02Combate��5      $
��Left=�6-   $	��280��6H   $��
161,63,0,0q�6U   $	��Top=�6i   $	��179��6�   $
��Fill=�6�   $��1��6�   $��2��6�   $��2��6�   �� 5   
   -   5         ��Name$ 	lbl_fight��5      $��Center=�6#   $��X��6G   $
��Left=�6S   $��
21,-13,0,0q�6n   $	��Top=�6�   $��Viner Hand ITC)�6�   $��66.667(�6�   $
��Bold"�6�   $��1��6�   $	��135��6�   $��2��6�   �� 5   
   -   5        $ lbl_vidaJogador01Combate��5      $
��Left=�6K   $��90��6m   $
��Left=�6z   $��	16,-9,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��53.333(�6�   $
��Bold"�6�    J� RenderTransformOrigin$ 1.494,0.482&�6   $	��143��6$  $��78��60  
��� � �$��2��6N  �� 5   
   -   5        $ lbl_NomeJogador01Combate��5      $��Center=�6K   $��Noob01��6o   $
��Left=�6�   $��10,227.308,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��26.667(�6�   $
��Bold"�6�   $	��159��6  
����  �$��1��6)  &   System.Windows.Media.TextOptions	   TextFormattingMode$	 Display=�66  �� 5   
   -   5        $ lbl_NomeJogador02Combate��5      $��Center=�6K   $��Noob02��6o   $
��Left=�6�   $��0,225.308,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��26.667(�6�   $
��Bold"�6�   $	��162��6
  $��2��6  
����  �$��1��68  $	 Display=�6E  �� 5   
   -   5        $ lbl_danoJogador01Combate��5      $��Center=�6K   $	��...��6o   $
��Left=�6}   $��	89,-2,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��46.667(�6�   $
��Bold"�6�   $ 1.494,0.482&�6  $	��141��6'  $��82��63  
���  ��$��2��6P  $��2��6d  �� 5   
   -	   5        $ lbl_danoJogador02Combate��5      $��Center=�6K   $	��...��6o   $
��Left=�6}   $��	112,0,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��46.667(�6�   $
��Bold"�6�   $ 1.494,0.482&�6  $	��143��6'  $��82��63  
���  ��$��1��6P  $��2��6`  $��2��6t  �� 5   
   -
   5        $ lbl_vidaJogador02Combate��5      $��Right=�6K   $��90��6n   $
��Left=�6{   $��0,-9,0,0q�6�   $	��Top=�6�   $��Viner Hand ITC)�6�   $��53.333(�6�   $
��Bold"�6�   $ 1.494,0.482&�6   $	��148��6$  $��78��60  $��2��6<  
��� � �$��2��6^  �� 5   
   -   5        
 ��Name$
 listBox_combateLog��5      $��1��6G   $
��Left=�6W   $	��282��6r   $��5,63,0,0q�6   $	��Top=�6�   $	��168��6�   $ �� IsSynchronizedWithCurrentItem$
 TrueY�6�    J� 	AllowDrop . $��2��6�   5      5      