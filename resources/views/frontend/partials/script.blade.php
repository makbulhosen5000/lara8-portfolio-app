<!-- core  -->
<script src="{{ asset('public/frontend') }}/assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="{{ asset('public/frontend') }}/assets/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap 3 affix -->
<script src="{{ asset('public/frontend') }}/assets/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- Isotope  -->
<script src="{{ asset('public/frontend') }}/assets/vendors/isotope/isotope.pkgd.js"></script>

<!-- Google mpas -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtme10pzgKSPeJVJrG1O3tjR6lk98o4w8&callback=initMap"></script>

<!-- JohnDoe js -->
<script src="{{ asset('public/frontend') }}/assets/js/johndoe.js"></script>
<!-- Toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif
</script>

<!-- ajax request for chat application -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

{{-- js for chat application start --}}
<script>
    var firebaseApp = firebase.initializeApp({ 
  apiKey: "AIzaSyC4cGXqwHlZC1iv9ZjeXaNqyzI-kMh7y6Y",
    authDomain: "kupidochat-bd3c5.firebaseapp.com",
    databaseURL: "https://kupidochat-bd3c5.firebaseio.com",
    storageBucket: "kupidochat-bd3c5.appspot.com",
    messagingSenderId: "972492700679"
});

var db = firebaseApp.database();

var chatApp = db.ref('chatApp'); //chatApp

var dirRef = chatApp.child('directory');
var chatRef = chatApp.child('chats');
var userRef = chatApp.child('users');


var app = new Vue({
  el: '#chatApp',
  firebase: {
    directory: dirRef
  },
  data: {
    headUser: 'Marinho Gomes',
    showChatList: false,
    chatBoxArea: true,
    currentChats: []
  },
  methods: {
    showUsuario: function(id){
      console.log(id);
    },
    expandTextArea: function(){
      $('#chatBox-textbox').height(80);
      $('#chatTextarea').height(60);
    },
    dexpandTetArea: function(){
      $('#chatBox-textbox').height(60);
      $('#chatTextarea').height(40);
    },
    toggleChat: function(){
      if(this.chatBoxArea){
        $('#chatbox-area').hide();
      }else{
        $('#chatbox-area').show();
      }
      this.chatBoxArea = !this.chatBoxArea;
    },
    openChatBox: function(info){
      
    },
    startChat: function(user){
      
    },
    expandChatList: function(){    $("#userListBox").slideToggle();
      this.showChatList = !this.showChatList;
      
    }
  }
})
</script>
{{-- js for chat application end --}}
