package Tolkens;


public class MainTolkens {
	
	public static void main(String[] args) {
		
		String s = "Espada;10;5;Uma-M�o;Leva";
		String [] ss = s.split(";");
		for (String stg : ss) {
			System.out.println(stg);
		}
		
		
	}
}
