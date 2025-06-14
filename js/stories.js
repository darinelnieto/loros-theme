var pages = 1;
var curent_page = 1;
var post_per_page = 50;
var price = '';
var the_prices = [];
var prices = '';
$(()=>{
    get_relatos();
})
function read_more(){
    if(curent_page < pages){
        get_relatos();
    }
}
function validate(){
    if(curent_page == pages){
        $('.read-more').addClass('d-none');
    }
}
function print_card(resp){
    console.log(resp);
    for(item of resp.relatos){
        $('#relatos-list').append(`
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <a href="${item.permalink}">
                    <div class="card-posts">
                        <div class="image-contain">
                            <img src="${item.thumbnail}" alt="${item.title}">
                        </div>
                        <div class="text-contain">
                            <h3 class="name-post">${item.title}</h3>
                            <p class="description">${item.short_description}</p>
                            <p class="label-text"><strong class="label">${author_label}:</strong> ${item.author}</p>
                            <p class="label-text"><strong class="label">${location_label}:</strong> ${item.country} - ${item.city}</p>
                            <p class="label-text"><strong class="label">${species_label}:</strong> ${item.species}</p>
                            <p class="label-text"><strong class="label">${date_label}:</strong> ${item.post_date}</p>
                            <span class="read-more-text">${cta_text}</span>
                        </div>
                    </div>
                </a>
            </div>
        `);
    }
}
// Read all
function get_relatos(){
    if(curent_page < pages){
        curent_page++;
    }
    $.ajax({
        type:'GET',
        url: rout,
        data:{
            posts_per_page: post_per_page,
            offset: (curent_page - 1) * post_per_page,
        }
    }).done(function(resp){
        pages = Math.ceil(resp.total[0].total / post_per_page);
        validate();
        print_card(resp);
    }).catch(()=>{
        console.log('Ha ocurrido un error');
    });
}