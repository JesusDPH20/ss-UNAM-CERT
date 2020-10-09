//Validar textfield
var noticia = document.getElementById("Noticia").innerHTML;
var btn1 = document.getElementById("btn1").innerHTML;
// Listen for changes in the text
noticia.getDocument().addDocumentListener(new DocumentListener() {
  public void changedUpdate(DocumentEvent e) {
    changed();
  }
  public void removeUpdate(DocumentEvent e) {
    changed();
  }
  public void insertUpdate(DocumentEvent e) {
    changed();
  }

  public void changed() {
     if (noticia.getText().equals("")){
       btn1.setEnabled(false);
     }
     else {
       btn1.setEnabled(true);
     }
  }

});
