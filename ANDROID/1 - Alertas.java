// XML
	android:onClick="clicarTela"

// JAVA

 public void clicarTela(View view) {

        //=============Toast===================================
        Toast t = Toast.makeText(getApplicationContext(), "Mensagem de alerta do Toast", Toast.LENGTH_SHORT);
        t.show();


        //==========AlertDialog================================

        AlertDialog.Builder adc = new AlertDialog.Builder(this);
        adc.setIcon(R.drawable.pata);
        adc.setTitle("Titulo do AlertDialog");
        adc.setMessage("Titulo do AlertDialog");

        adc.setPositiveButton("Sim", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Toast.makeText(getApplicationContext(), "SIM", Toast.LENGTH_SHORT).show();
            }
        });

        adc.setNegativeButton("Nao", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Toast.makeText(getApplicationContext(), "NAO", Toast.LENGTH_SHORT).show();
            }
        });

        adc.setNeutralButton("Neutro", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Toast.makeText(getApplicationContext(), "NEUTRO", Toast.LENGTH_SHORT).show();
            }
        });


        AlertDialog ad = adc.create();
        ad.show();




    }
