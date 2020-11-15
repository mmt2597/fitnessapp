<template>
	
	<div>
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <inertia-link class="navbar-brand" href="/">Fitness App</inertia-link>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdownLeft" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               Manage
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownLeft">
                                <!-- <a class="dropdown-item" href="#" @click="handleLogout">Leads</a> -->
                                <inertia-link href="/leads/list" class="dropdown-item" >Leads</inertia-link>
                            </div>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                               Marlon Tandoc
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#" @click="handleLogout">Logout</a>
                                <!-- <inertia-link href="logout" method="post">Logout</inertia-link> -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <slot />
        </main>
	</div>

</template>

<script>

export default {
	methods: {
		async handleLogout() {
			await axios.post('/logout', {});
			window.location.href ="/";
		}
	}
}

</script>