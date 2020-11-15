<template>
	<div>
	<layout>
		<div class="container">
			<div class="row mb-3">
				<div class="col-md-12">
					<h1 class="float-left">Leads</h1>
					<inertia-link :href="$route('lead.add')" class="float-right btn btn-primary">Add Lead</inertia-link>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered bg-white">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>age</th>
							<th>Package</th>
							<th>Added On</th>
							<th></th>
						</tr>
						<tr v-for="lead in leads" :key="lead.id">
							<td>{{ lead.id }}</td>
							<td>{{ lead.name }}</td>
							<td>{{ lead.email }}</td>
							<td>{{ lead.phone }}</td>
							<td>{{ lead.age }}</td>
							<td>{{ lead.interested_package }}</td>
							<td>{{ lead.created_at }}</td>
							<td>
								<inertia-link :href="$route('lead.view', {lead: lead})">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="arrow-icon" height="20">
					                    <polygon
					                      points="12.95 10.707 13.657 10 8 4.343 6.586 5.757 10.828 10 6.586 14.243 8 15.657 12.95 10.707"
					                    />
				                  	</svg>
			                  	</inertia-link>
							</td>
						</tr>
					</table>

				</div>
			</div>
		</div>
	</layout>
	</div>
</template>

<script>

import Layout from './../../Shared/Layout.vue';

export default {
	components: {
		Layout,
	},
	data() {
		return {

		};
	},
	props: ['leads'],
}
</script>