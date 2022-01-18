//search-contact

$('#search-contact').on('keyup', function(){
    search();
});

search();

function search() {

     var keyword = $('#search-contact').val();

     $.post('/search',
      {
         _token: $('meta[name="csrf-token"]').attr('content'),
         keyword:keyword
       },
       function(data){
           show_users(data);
           // console.log(data);
       });
}

function show_users(res) {
    let htmlView = '';

    if(res.users.length <= 0){
        htmlView+= `
           <li class="user-list-item">
              <p>No data.</p>
          </li>`;
    }

    for(let i = 0; i < res.users.length; i++){
        htmlView += `
        <li class="user-list-item" style="overflow: hidden;">
            <a href="/dashboard/` + res.users[i].id + `">
            <div class="avatar avatar-online">
                <img src="/storage/images/users/` + res.users[i].image + `" class="rounded-circle" alt="image">
            </div>
            <div class="users-list-body">
                <div>
                    <h5>` + res.users[i].name + `</h5>
                    <p>` + res.users[i].about + `</p>
                </div>
                <div class="last-chat-time">
                    <div class="chat-toggle mt-1">
                        <div class="dropdown">
                            <a data-toggle="dropdown" href="#">
                                <i class="fas fa-ellipsis-h ellipse_header"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </li>
            `;
    }

    $('#user-list').html(htmlView);
}
