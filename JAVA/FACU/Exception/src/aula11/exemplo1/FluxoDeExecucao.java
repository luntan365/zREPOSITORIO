package aula11.exemplo1;

public class FluxoDeExecucao {
	public static void main(String[] args) {
		System.out.println("in�cio main");
		try{
			m1();
		}catch(ArrayIndexOutOfBoundsException e){
			System.out.println("�ndice inv�lido");
		}
		System.out.println("fim main");
	}

	private static void m1() {
		System.out.println("in�cio m1");
		m2();
		System.out.println("fim m1");
	}
	
	private static void m2() {
		System.out.println("in�cio m2");
		int[] array = new int[5];
		for (int i = 0; i < array.length; i++) {
			array[i] = i;
			System.out.print(array[i] + " ");
		}
		
		System.out.println("fim m2");
	}
}





