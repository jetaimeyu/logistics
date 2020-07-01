<template>
	<view class="container">
		<view class="icon-edit"></view>
		<view class="page-section page-section-gap" style="text-align: center;">
			<audio style="text-align: left" :src="current.src" :poster="current.poster" :name="current.name" :author="current.author"
			 :action="audioAction" controls></audio>
		</view>

		<view>
			<uni-calendar ref="calendar" :insert="false" @confirm="confirm" />
			<button @click="open">打开日历</button>
		</view>
		<button type="primary" @click="getUser">dd</button>
		<button type="default" @click="getUser">dd</button>
		<button type="warn" @click="getUser">dd</button>
	</view>
</template>

<script>
	import uniCalendar from '@/components/uni-calendar/uni-calendar.vue'
	export default {
		data() {
			return {}
		},
		components: {
			uniCalendar
		},
		created() {
			console.log("created");
			this.login();
		},
		onLoad() {
			console.log("onload");
		},
		methods: {
			open() {
				this.$refs.calendar.open();
			},
			confirm(e) {
				console.log(e);
			},
			//登录
			login() {
				const that = this;
				uni.request({
					url: "https://jetaime.top/api/login?username=15106950278&password=11111111",
					method: "get",
					success(res) {
						console.log(res);
						if (res.statusCode == 200) {
							that.$store.dispatch('loadUserInfo', res.data)
						}
						that.userInfo = res.data;
					},
					fail(err) {
						console.log("请求失败");
					}
				})
			},
			getUser() {
				const that = this;
				uni.request({
					url: "https://jetaime.top/api/v1/user",
					method: "GET",
					header: {
						Authorization: that.$store.state.userInfo.token_type + " " + that.$store.state.userInfo.access_token
					},
					success(res) {
						console.log("获取数据", res)
					},
					fail(err) {
						console.log(err)
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
