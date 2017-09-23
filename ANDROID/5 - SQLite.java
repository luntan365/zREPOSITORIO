SQLiteDatabase sqlite = null;
       Cursor cursor = null;
       try {
           sqlite = openOrCreateDatabase("dejota.db", MODE_PRIVATE, null);

           sqlite.execSQL("CREATE TABLE IF NOT EXISTS pessoa (id INTEGER PRIMARY KEY AUTOINCREMENT, nome TEXT, idade INTEGER);");

           sqlite.execSQL("DELETE FROM pessoa WHERE nome = 'litt' ");

           sqlite.execSQL("INSERT INTO pessoa (nome, idade) values ('dejota', 28)");
           sqlite.execSQL("INSERT INTO pessoa (nome, idade) values ('litt', 25)");

           cursor = sqlite.rawQuery("SELECT * FROM pessoa", null);
           int idxId = cursor.getColumnIndex("id");
           int idxNome = cursor.getColumnIndex("nome");
           int idxIdade = cursor.getColumnIndex("idade");



           while (cursor.moveToNext()){
               String s = "Id:"+cursor.getLong(idxId)+", Nome: "+ cursor.getString(idxNome)+", Idade:"+cursor.getInt(idxIdade);
               Log.i("LogX", s);
           }

       } catch (Exception e) {
           Log.i("LogX", e.getMessage());
           e.printStackTrace();
       } finally {
           if (cursor != null) { cursor.close(); }
           if (sqlite != null) { sqlite.close(); }
       }

   }
