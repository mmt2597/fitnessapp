<template>
	<layout>
		<div class="container">
			<div class="row mb-3">
				<div class="col-md-12">
					<h1 class="float-left">Leads/List</h1>
				</div>
			</div>

			<form action="" @submit.prevent="handleSubmit()">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Enter Name" v-model="lead.name" id="name" tabindex="1">
						</div>
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="phone" class="form-control" placeholder="Enter phone" v-model="lead.phone" id="phone" tabindex="3">
						</div>
						<div class="form-group">
							<label for="package">Interested Package</label>
							<input type="text" class="form-control" placeholder="Enter package" v-model="lead.interested_package" id="package" tabindex="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" placeholder="Enter email" v-model="lead.email" id="package" tabindex="2">
						</div>						<div class="form-group">
							<label for="dob">Birthdate</label>
							<input type="date" class="form-control" placeholder="Enter dob" v-model="lead.dob" id="dob" tabindex="4">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success">Save</button>
						<inertia-link class="btn btn-primary" :href="$route('lead.list')">Back</inertia-link>
					</div>
				</div>
			</form>
		</div>
	</layout>
</template>

<script>

import Layout from './../../Shared/Layout.vue';

export default {
	props: {
		leadProp: Object
	},
	components: {
		Layout
	},
	methods: {
		async handleSubmit() {
			let response = await this.$inertia.post('/leads/update', this.lead);
		}
	},
	data() {
		return {
			lead: {
				name: '',
				email: '',
				phone: '',
				dob: '',
				interested_package: '',
			}
		}
	},
	created() {
		this.lead = this.leadProp
	},
}

</script>