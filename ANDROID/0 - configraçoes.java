//=====================================================================================================================
// NOME DO APLICATIVO: res/values/string.xml
<string name="app_name">Nome do Aplicativo</string>

//=====================================================================================================================
// ALTERAR ICONE APLICAÇÂO: manifest.xml
android:icon="@mipmap/imagem_icone"

//=====================================================================================================================
//TELA DE SPLASH AO INICIAL:
public class MainActivity extends AppCompatActivity implements Runnable{
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
		// tela fica esperando por 3 segundos e depois chama metodo run()
        Handler h = new Handler();
        h.postDelayed(this, 3000);
    }

	// metodo a ser chamado depois, implementação de Runnable
    @Override
    public void run() {
		// EU VERIFICARIA SE A PESSOA ESTA LOGADA, SE NÃO { CHAMARIA A TELA DE LOGIN } SE SIM { CHAMRIA TELA PRINCIPLA }
        startActivity(new Intent(this, TelaPrincipal.class)); // chama a tela principal da plicação
        finish(); //remove tela da pliha de exucuções
    }
}

//=====================================================================================================================
// REMOVER BARRA DE TITULO DO TOP:  res/values/style.xml e altere o tema
<style name="AppTheme" parent="Theme.AppCompat.Light.NoActionBar">

//=====================================================================================================================
// ORIENTAÇÃO PORTATIL OU LANDSCAPE DA ACTIVE
// USANDO JAVA NA CATIVITY
@Override
public void onCreate(Bundle savedInstanceState) {
  setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
}
// OU VA NO MANIFEST.XML
<activity android:name=".MainActivity"
	android:screenOrientation="landscape"
	android:configChanges="keyboardHidden|orientation|screenSize">



