<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card bg-dark">
                    <div class="card-header">
                        <h1 class="text-light">
                            {{headerText}}
                        </h1>
                    </div>

                    <div class="text-light p-3">
                        {{bodyText}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: {
            headerText: {},
            bodyText: {}
        }
    }
</script>
