<template>
	<div>
    	<h1>Wally Factory</h1>
    	<input v-model="amount"/>
    	<button @click="submit()">submit</button>
    	<br>
	</div>

	<div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
	  <div v-for="(v, k) in errors" :key="k">
	    <p v-for="error in v" :key="error" class="text-sm">
	      {{ error }}
	    </p>
	  </div>
	</div>
	<div v-if="packages">
		<br>
	  	<div v-for="(v, k) in packages">
	  		Package Quantity {{v[0]}} *  Widget Amount {{v[1]}}
	  	</div>
	</div>

</template>
<script>
import axios from 'axios'

export default {
    data() {
        return  {
            amount: null,
            errors:null,
            packages:null,          
        }
    },

	methods: {
	    submit() {
	    	this.packages = null;
	    	this.errors = null;

	    	const params = new URLSearchParams();
	    	if(this.amount) {
	    		params.append('amount', this.amount);
	    	}

	      	axios
		        .get('/api/home', {params:params})
		        .then(data => {
		          	this.packages = data.data.packages;
		        })
		        .catch(e => {
		          this.errors = e.response.data.errors;
		        });
	    },
	}
}
</script>