<template>
  <header class="sticky top-0 bg-white z-10">
    <div class="red-line">
      <Container class="flex items-center justify-center">
        <NuxtLink to="/">
          <Image src="/img/logo.png" alt="Image" width="120" />
        </NuxtLink>
        <Divider layout="vertical" />
        <IconField>
          <InputIcon class="pi pi-search" />
          <InputText class="md:min-w-[48rem]" v-model="pesquisa" placeholder="O que deseja encontrar?" />
        </IconField>
        <Divider layout="vertical" />
        <div class="flex gap-3 items-center">
          <i class="pi pi-user text-2xl"></i>
          <div>
            <p>Minha conta</p>
            <NuxtLink to="/login" class="hover:underline font-bold">Entrar</NuxtLink>
          </div>
        </div>
        <Divider layout="vertical" />
        <div class="flex gap-3 items-center"> <!--parte de carrinho na header-->
          <NuxtLink to="/carrinho" class="flex gap-3 items-center">
          <i class="pi pi-shopping-cart text-2xl"></i> <!--icon de carrinho -->
          <div>
            <p>Carrinho</p>
            <p class="font-bold">{{ formatCurrency(price) }}</p> <!--atualização de preço-->
          </div>
          </NuxtLink>

        </div>
      </Container>
    </div>
    <Container class="flex items-center py-0">
      <NavigationMenuRoot v-model="currentTrigger" class="relative z-[1]">
        <NavigationMenuList>
          <NavigationMenuItem>
            <NavigationMenuTrigger class="flex gap-2 items-center py-1">
              <i class="pi pi-bars"></i>
              <span class="font-medium">Todas as categorias</span>
            </NavigationMenuTrigger>
            <NavigationMenuContent class="absolute bg-white shadow w-full">
              <NavigationMenuSub class="relative">
                <NavigationMenuList class="shadow">
                  <NavigationMenuItem v-for="categoria in categorias" class="w-full">
                    <NavigationMenuTrigger class="hover:bg-highlight p-3 data-[state=open]:bg-highlight w-full text-start">
                      <NuxtLink :to="{ name: 'categoria', params: { categoria: categoria.name.toLowerCase() } }">
                        {{ categoria.name }}
                      </NuxtLink>
                    </NavigationMenuTrigger>
                    <NavigationMenuContent class="absolute top-0 left-full grid grid-cols-3 w-max bg-white shadow">
                      <div v-for="subcategoria in categoria.subcategorias" class="p-4">
                        <span class="font-medium text-sm">{{ subcategoria.title }}</span>
                        <ul>
                          <li v-for="tipo in subcategoria.list" class="text-sm py-1 hover:underline">
                            <NuxtLink :to="{ name: 'categoria-id', params: { id: tipo.toLowerCase(), categoria: categoria } }">
                              {{ tipo }}
                            </NuxtLink>
                          </li>
                        </ul>
                      </div>
                    </NavigationMenuContent>
                  </NavigationMenuItem>
                </NavigationMenuList>
              </NavigationMenuSub>
            </NavigationMenuContent>
          </NavigationMenuItem>
        </NavigationMenuList>
      </NavigationMenuRoot>
    </Container>
  </header>
</template>

<script setup>
const { formatCurrency } = useCurrency();
const price = ref(0);
const pesquisa = ref('');
const currentTrigger = ref('');

const focus = (event) => {
  console.log('value');
  event.preventDefault();
}

const categorias = [
  {
    name: 'Medicamentos',
    subcategorias: [
      {
        title: 'Remédios',
        list: [
          'Para alergias',
          'Pílulas Anticoncepcionais e DIU',
          'Anti-inflamatórios',
          'Antidepressivos',
          'Para Asma',
          'Congestão nasal',
          'Para Diabetes',
          'Para Gastrite',
          'Para Dor e Febre',
        ]
      },
      {
        title: 'Medicamentos especiais',
        list: [
          'Endocrinologia',
          'Oncologia',
          'Cardiologia',
          'Ginecologia',
          'Urologia',
          'Reumatologia',
          'Infertilidade',
          'Outras especialidades',
        ]
      },
      {
        title: 'Medicamentos controlados',
        list: [
          'Ansiolíticos',
          'Antidepressivos',
          'Antipsicóticos',
          'Hipnóticos',
          'Estimulantes',
          'Outros',
        ]
      },
      {
        title: 'Primeiros socorros',
        list: [
          'Curativos',
          'Algodão',
          'Soros',
          'Higienizadores',
          'Outros',
        ]
      }
    ],
  },
  {
    name: 'Beleza',
    subcategorias: [
      {
        title: 'Cuidados com a pele',
        list: [
          'Hidratantes',
          'Protetores solares',
          'Anti-idade',
          'Limpeza de pele',
          'Outros',
        ]
      },
      {
        title: 'Cuidados com o cabelo',
        list: [
          'Shampoos',
          'Condicionadores',
          'Máscaras',
          'Tinturas',
          'Outros',
        ]
      },
      {
        title: 'Maquiagem',
        list: [
          'Bases',
          'Corretivos',
          'Pós',
          'Batom',
          'Outros',
        ]
      },
      {
        title: 'Perfumes',
        list: [
          'Femininos',
          'Masculinos',
          'Infantis',
          'Unissex',
        ]
      }
    ],	
  },
  {
    name: 'Higiene',
    subcategorias: [
      {
        title: 'Higiene bucal',
        list: [
          'Escovas de dente',
          'Pastas de dente',
          'Enxaguantes bucais',
          'Fio dental',
          'Outros',
        ]
      },
      {
        title: 'Higiene pessoal',
        list: [
          'Sabonetes',
          'Desodorantes',
          'Absorventes',
          'Preservativos',
          'Outros',
        ]
      },
      {
        title: 'Higiene íntima',
        list: [
          'Sabonetes',
          'Absorventes',
          'Duchas',
          'Outros',
        ]
      },
      {
        title: 'Higiene do bebê',
        list: [
          'Fraldas',
          'Lenços umedecidos',
          'Shampoos',
          'Outros',
        ]
      }
    ],
  },
  {
    name: 'Nutrição',
    subcategorias: [
      {
        title: 'Suplementos',
        list: [
          'Vitaminas',
          'Minerais',
          'Proteínas',
          'Outros',
        ]
      },
      {
        title: 'Emagrecimento',
        list: [
          'Termogênicos',
          'Bloqueadores de gordura',
          'Inibidores de apetite',
          'Outros',
        ]
      },
      {
        title: 'Alimentação saudável',
        list: [
          'Orgânicos',
          'Sem glúten',
          'Sem lactose',
          'Outros',
        ]
      },
      {
        title: 'Nutrição infantil',
        list: [
          'Leites',
          'Papinhas',
          'Vitaminas',
          'Outros',
        ]
      }
    ],
  }
];

</script>

<style scoped>
.red-line {
  border-bottom: .25em solid;
  @apply border-red-500;
}
</style>