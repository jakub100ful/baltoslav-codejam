<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card bg-light">
                    <div class="card-header bg-info">
                        <h1 class="text-light text-center">
                            {{headerText}}
                        </h1>
                    </div>

                    <div class="text-light p-3">
                        {{bodyContent}}
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
            bodyContent: {}
        }
    }
</script>
