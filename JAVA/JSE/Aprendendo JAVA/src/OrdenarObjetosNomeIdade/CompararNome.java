package OrdenarObjetosNomeIdade;

import java.util.Comparator;

public class CompararNome implements Comparator<Aluno>{
	
	//compara��o para utilixa��o do metodo Colletions.sort();	
	 public int compare(Aluno aluno, Aluno outroAluno) {
		 return aluno.getNome().compareTo(outroAluno.getNome());
	}
		 
		 
}
