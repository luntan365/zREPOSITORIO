
	// primeira tela

    public void irSegundaTela (View view){
        Intent it = new Intent(MainActivity.this, SegundaTela.class);
        it.putExtra("id_texto_enviado", "Conteudo vindo da primeira tela");
        startActivity(it);
    }





	//segunda tela

	protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_segunda_tela);
        TextView tv = (TextView) findViewById(R.id.text_view_id);
        String s = getIntent().getStringExtra("id_texto_enviado");
        tv.setText(s);
    }
