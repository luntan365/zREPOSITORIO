package zVariadas;

import javax.swing.JOptionPane;

public class Condicao {
	public static void main(String[] args) {
		
		int idade = Integer.parseInt(JOptionPane.showInputDialog("qual sua idade"));
		System.out.println(idade >= 18 ? "Voc� � maior de idade." : "Voc� � menor de idade");
		
	}

}
