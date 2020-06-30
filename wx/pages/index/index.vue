<template>
	<view class="container">
		<view>
			<text class="intro">{{userInfo.user_info.id}}{{userInfo.user_info.name}}{{userInfo.user_info.phone}}</text>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				href: 'https://uniapp.dcloud.io/collocation/pages?id=easycom',
				userInfo:{}
			}
		},
		created() {
			console.log("created");
			this.login();
		},
		onLoad() {
			console.log("onload");
		},
		methods: {
			//登录
			login(){
				const that =this;
				uni.request({
					url:"https://jetaime.top/api/login?username=15106950278&password=11111111",
					method:"get",
					success(res) {
						console.log(res);
						if(res.statusCode==200){
							that.$store.dispatch('loadUserInfo', res.data)
						}
						that.userInfo = res.data;
					},
					fail(err) {
						console.log("请求失败");
					}
				})
			}
				

		}
	}
</script>

<style>
	.intro {
		font-size: 14px;
		line-height: 24px;
	}
</style>
