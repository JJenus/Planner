var eventBus = new Vue(); 

Vue.component('deusign', {
  props: ['plan'], 
  data() {
    return {
      favorite: false, 
      info: this.plan.infos, 
      inCart: false,
      index: null, 
    };
  }, 
  
  /*methods: {
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
  },*/
  
  beforeMount(){
    console.log('before mount');
    /*eventBus.$on('addedToCart'+this.plan.id, index => {
      this.index = index;
      console.log(index);
    });*/
  }, 
  
  template: `
    <div class="col-lg-4 col-md-6 mb-3">
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
            <span v-if=" info.baths" class="text-center">
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
              <button class="btn rounded-pill  btn-outline-warning ">
                <i class="fas fa-eye"></i> Preview 
              </button>
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
  el: "#app", 
  data: {
    plans: [
      {"id":3,"user_id":1,"dimension":"2303m x 1633m","category":"Beach House","cost":"30000","created_at":"2021-05-08 10:38:19","updated_at":"2021-05-08 10:38:19","deleted_at":null,"images":[{"id":7,"plan_id":"3","url":"http://localhost:8080/uploads/SfRtu/1620488257_2ca0086c0ddd2dec8717.jpeg","type":"plan","created_at":"2021-05-08 10:38:20","updated_at":"2021-05-08 10:38:20","deleted_at":null},{"id":8,"plan_id":"3","url":"http://localhost:8080/uploads/SfRtu/1620488257_05daf63f5ebf1d77883e.jpeg","type":"plan","created_at":"2021-05-08 10:38:20","updated_at":"2021-05-08 10:38:20","deleted_at":null},{"id":9,"plan_id":"3","url":"http://localhost:8080/uploads/SfRtu/1620488257_8df540b6b4f3e496265c.jpeg","type":"plan","created_at":"2021-05-08 10:38:20","updated_at":"2021-05-08 10:38:20","deleted_at":null}],"infos":[]},{"id":2,"user_id":1,"dimension":"1323m x 1633m","category":"Luxury home","cost":"239000","created_at":"2021-05-08 10:27:00","updated_at":"2021-05-08 10:27:00","deleted_at":null,"images":[{"id":4,"plan_id":"2","url":"http://localhost:8080/uploads/6tjrQ/1620487541_59e3d3130e111c6373dd.jpeg","type":"plan","created_at":"2021-05-08 10:27:01","updated_at":"2021-05-08 10:27:01","deleted_at":null},{"id":5,"plan_id":"2","url":"http://localhost:8080/uploads/6tjrQ/1620487541_e7cbcc75ebd55b1ad029.jpeg","type":"plan","created_at":"2021-05-08 10:27:01","updated_at":"2021-05-08 10:27:01","deleted_at":null},{"id":6,"plan_id":"2","url":"http://localhost:8080/uploads/6tjrQ/1620487541_644000c346b857a24092.jpeg","type":"plan","created_at":"2021-05-08 10:27:01","updated_at":"2021-05-08 10:27:01","deleted_at":null}],"infos":{"price-CAD":7000}},{"id":1,"user_id":1,"dimension":"2,300 sq ft","category":"Farm House ","cost":"27000000","created_at":"2021-05-07 05:29:41","updated_at":"2021-05-07 05:29:41","deleted_at":null,"images":[{"id":1,"plan_id":"1","url":"http://localhost:8080/uploads/SVT6t/1620383147_5f876eb8dd872454bf94.jpeg","type":"plan","created_at":"2021-05-07 05:29:42","updated_at":"2021-05-07 05:29:42","deleted_at":null},{"id":2,"plan_id":"1","url":"http://localhost:8080/uploads/SVT6t/1620383147_692ababb87da18cf23de.jpeg","type":"plan","created_at":"2021-05-07 05:29:42","updated_at":"2021-05-07 05:29:42","deleted_at":null},{"id":3,"plan_id":"1","url":"http://localhost:8080/uploads/SVT6t/1620383147_4b29466ea1bfb60f9d25.jpeg","type":"plan","created_at":"2021-05-07 05:29:42","updated_at":"2021-05-07 05:29:42","deleted_at":null}],"infos":{"price-CAD":23333,"Kitchens":350}}] ,
    cart: [], 
    begin: 0,
    limit: 10,
    count: 0,
  },
  
  methods: {
    loadPlans(){
      $.ajax({
        method: 'POST', 
        url: '/plan/get', 
        data: {"limit": this.limit, "begin": this.begin}, 
        success: (res)=>{
          this.plans = res.data.plans;
          this.begin += this.plans.length;
          this.count = res.data.count;
          console.log(JSON.stringify(this.plans));
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
      /*$.ajax({
        method: 'POST', 
        url: 'plan/add-to-cart', 
        data: {removeFromCart: true, rowId: args.rowId}, 
        success: (res)=>{
          console.log(res)
        }, 
        error: (err)=>{
          console.log(err)
        }, 
      })*/
    }, 
    
    addToCart(plan){
      this.cart.push(plan);
      eventBus.$emit('addedToCart'+plan.id, (this.cart.length-1))
      $.ajax({
        method: 'POST', 
        url: 'plan/add-to-cart', 
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
  //this.loadPlans()
    eventBus.$on('addToCart', plan => {
      console.log(plan)
      this.addToCart(plan);
    })
    
    eventBus.$on('remove', id => {
      this.removeFromCart(id);
    })
  }, 
})