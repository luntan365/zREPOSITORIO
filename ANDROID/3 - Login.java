

	@Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Button telaInicial = (Button)findViewById(R.id.btn_logar);
        telaInicial.setOnClickListener(onClickTelaInicial());
    }

    

   private View.OnClickListener onClickEntrar() {
        return new View.OnClickListener(){
            @Override
            public void onClick(View v) {

                TextView login = (TextView) findViewById(R.id.edtNome);
                TextView senha = (TextView)findViewById(R.id.edtSenha);
                String stringLogin = login.getText().toString();
                String stringSenha = senha.getText().toString();

                if(stringLogin.equals("dejota") && stringSenha.equals("123")){

                  Intent it = new Intent(Login.this, TelaInicial.class);
					        startActivity(it);

                }else

                  Toast.makeText(this, "Login ou senha invalido", Toast.LENGTH_SHORT).show();
            }
        };
    }
