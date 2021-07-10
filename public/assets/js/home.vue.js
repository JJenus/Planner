var eventBus = new Vue(); 

Vue.component('plans', {
  props: ['plan'], 
  data() {
    return {
      favorite: false, 
      info: this.plan.infos, 
      inCart: false,
      index: null, 
      preview_url: "http://localhost:8080/plans/"+this.plan.id
    };
  }, 
  
  methods: {
    toggleFav(){
      if (this.favorite) {
        this.favorite = false;
      }else{ 
        this.favorite = true;
      } 
    },
    
    addToCart(){
      if (this.inCart) {
        this.inCart = false;
        eventBus.$emit('remove', {index: this.index, rowId: 'xeaiuuu'}) ;
      }else{ 
        this.inCart = true;
        eventBus.$emit('addToCart', {
          id: this.plan.id,
          qty: 1,
          name: this.plan.category,
          price: this.plan.cost,
          options: {
            image: this.plan.images[0].url, 
            infos: this.plan.infos
          } 
        }) 
      }
      
    }, 
  },
  
  beforeMount(){
    console.log("BTC in ")
    console.log(this.plan);
    
    eventBus.$on('addedToCart'+this.plan.id, index => {
      this.index = index;
      console.log(index);
    });
  }, 
  
  template: `<div class="col-lg-4 col-md-6 mb-3">
      <div class="card">
      <div class="card-img-top position-relative " >
        <img :src="plan.images[0].url" class="rounded-top" alt="Card image">
        <a @click="toggleFav()" class="btn btn-sm m-2 btn-soft rounded-circle bottom-0 right-0 position-absolute" >
          <i :class="favorite ? 'text-danger':'' "  class="fas fa-heart" ></i>
        </a>
      </div>
        <div class="card-body align-items-end">
          <h5 class="card-title d-flex justify-content-between">
            <span>{{plan.category}}</span>
            <small class="font-weight-bold text-lg">{{plan.cost}}</small>
          </h5>
          <p class="card-text font-weight-bold d-flex justify-content-between font-size-sm">
            <span v-if="info.bed" class="text-center">
              <i class="fas fa-bed" ></i>
              {{info.beds}} 
            </span>
            <span v-if="info.Kitchens" class="text-center">
              <i class="fas fa-sink " ></i>
              {{info.Kitchens}}  
            </span>
            <span v-if="info.baths" class="text-center">
              <i class="fas fa-bath" ></i>
              {{info.baths}} 
            </span>
            <span class="text-center">
              <i class="" ></i>
              {{plan.dimension}} 
            </span>
          </p>
          <div class="w-100 mt-3 d-flex align-items-center justify-content-between ">
            <div>
              <a :href="preview_url" class="btn rounded-pill  btn-soft ">
                <i class="fas fa-eye"></i> Preview 
              </a>
            </div>
            <div>
              <button @click="addToCart()" class="btn btn-soft py-3 rounded-circle">
                <i :class="inCart ? 'fas fa-cart-arrow-down text-danger' : 'fas fa-cart-plus' " ></i> 
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
 `
});

var app = new Vue({
  el: "#plans", 
  data: {
    plans: [], 
    cart: [], 
    page: 1,
    count: 0,
    baseUrl: "http://localhost:8080"
  },
  
  methods: {
    loadPlans(){
      $.ajax({
        method: 'GET', 
        url: this.baseUrl+'/plans', 
        success: (res)=>{
          this.page++;
          this.plans.push(...res.data.plans);
          this.count = res.data.count;
          //console.log (this.plans);
        }, 
        error: (err)=>{console.log(err)}
      });
    }, 
    
    removeFromCart(args){
      this.cart.splice(args.index, 1)
      for(var i in this.cart){
        var id = this.cart[i].id
        eventBus.$emit('addedToCart'+id, i)
      }
      $.ajax({
        method: 'POST', 
        url: this.baseUrl+'plan/add-to-cart', 
        data: {removeFromCart: true, rowId: args.rowId}, 
        success: (res)=>{
          console.log(res)
        }, 
        error: (err)=>{
          console.log(err)
        }, 
      })
    }, 
    
    addToCart(plan){
      this.cart.push(plan);
      eventBus.$emit('addedToCart'+plan.id, (this.cart.length-1))
      $.ajax({
        method: 'POST', 
        url: this.baseUrl+'plans/add-to-cart', 
        data: {addToCart: true, plan: plan}, 
        success: (res)=>{
          console.log(res)
        }, 
        error: (err)=>{
          console.log(err)
        }, 
      }) 
    } 
    
  },
  
  beforeMount(){
    console.log("mounting app")
  this.loadPlans()
    eventBus.$on('addToCart', plan => {
      console.log(plan)
      this.addToCart(plan);
    })
    
    eventBus.$on('remove', id => {
      this.removeFromCart(id);
    })
  }, 
})