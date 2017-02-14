(function(){


  var config = {
    apiKey: "AIzaSyBnzya9pCBvRQvKmDWWHENc37v3JgyelX0",
    authDomain: "open-idea-802a4.firebaseapp.com",
    databaseURL: "https://open-idea-802a4.firebaseio.com",
    storageBucket: "open-idea-802a4.appspot.com",
    messagingSenderId: "990572933378"
  };
  firebase.initializeApp(config);
  var provider = new firebase.auth.GoogleAuthProvider();

  singInGoogle = document.getElementById('singInGoogle');
  deslogar     = document.getElementById('deslogar');

// Logar com a conta do Google
  singInGoogle.addEventListener('click', e => {
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Google Access Token. You can use it to access the Google API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
      console.log("erro no login");
    });
  });

// Deslogar usuario
  deslogar.addEventListener('click', e => {
    firebase.auth().signOut().then(function() { 
      console.log("Deslogou");
    }, function(error) {
      console.log("Deu erro ao deslogar");
    });
  });



firebase.auth().onAuthStateChanged(firebaseUser => {
  if(firebaseUser){
    
    name = tmp = firebaseUser.displayName;
    //console.log(nome);
  }else{
    console.log("Não logado");
  }
});

console.log("não compreendo "+ name);

// Usuario esta logado?
var user = firebase.auth().currentUser;

if (user) {
  console.log("Logado");
} else {
  console.log("Não Logado");
}

}());