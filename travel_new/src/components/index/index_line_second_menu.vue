<template>
	<div class="index-ls-menu-container">
		<div class="travel-place-box">
			<div class="travel-place" tag1id="Totag1id">
				<ul>
				    <li v-for="(value,index) in lsMenu" @click="changeActive(index)">
				    <router-link v-bind:to="'/index/'+Totag1id+'/'+value.id">
					     <div v-if="index==curTag-1" :tag2id="value.id"> <a href="javascript:" class="first-important"> <i>{{value.name}}</i> </a></div>
					     <div v-else :tag2id="value.id"> <a href="javascript:" class=""> <i>{{value.name}}</i> </a></div>
				    </router-link>
				    </li>          
				</ul> 
				<div class="clear"></div> 
			</div>
		</div>
		<router-view></router-view>

	</div>
</template>
<script>
	import http from '../../assets/js/axiosHttp'
	export default{
		data(){
			return {
				lsMenu:[],
				Totag1id:1,
				curTag:1 //切换当前tag
			}			
		},
		// props: ['Totag1id'],
		created(){
			//var id = this.$route.query.Totag1id?this.$route.query.Totag1id:this.Totag1id;
			var id=this.$route.params.tag1id
			this.Totag1id=this.$route.params.tag1id
			this.getlsMenu(id)
		},
		watch:{
			'$route':function(){
				// var id = this.$route.query.Totag1id?this.$route.query.Totag1id:this.Totag1id;
				// console.log('query:'+this.$route.query.Totag1id);
				// console.log('toid:'+this.Totag1id);
				// console.log('id:'+id);
				var id=this.$route.params.tag1id
				this.Totag1id=this.$route.params.tag1id
				this.getlsMenu(id)
		}},
		methods:{
			
			getlsMenu(id){
				// var secondMenuUrl=dataApi.indexSecondMenu+'?tag1='+'1'
				const data = {
		          params: {
		            tag1: id
		          }
		        }
				this.httpGet(dataApi.indexSecondMenu,data)
					.then((res)=>{
						if(res.status==1){
							console.log(res)
							this.lsMenu=res.data.lists
						}else{
							console.log('请求失败')
						}
					})
					.catch((error)=>{
						console.log(error)
					})	
			},
			changeActive(index){
				this.curTag=index+1
			}
		},
		mixins:[http]
	}
</script>
<style>
	
</style>