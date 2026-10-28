import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Quote Modal & Cart Store
Alpine.store('quoteCart', {
    isOpen: false,
    selectedProduct: null,
    selectedColor: '',
    selectedSize: '',
    quantity: 12,
    
    open(product = null) {
        this.selectedProduct = product;
        if (product && product.colors && product.colors.length > 0) {
            this.selectedColor = product.colors[0];
        } else {
            this.selectedColor = '';
        }
        if (product && product.sizes && product.sizes.length > 0) {
            this.selectedSize = product.sizes[0];
        } else {
            this.selectedSize = '';
        }
        this.quantity = 12;
        this.isOpen = true;
        document.body.style.overflow = 'hidden';
    },

    close() {
        this.isOpen = false;
        document.body.style.overflow = 'auto';
    }
});

// Search Modal Store
Alpine.store('searchModal', {
    isOpen: false,
    query: '',
    results: [],
    loading: false,

    open() {
        this.isOpen = true;
        this.query = '';
        this.results = [];
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            const input = document.getElementById('search-input-field');
            if (input) input.focus();
        }, 100);
    },

    close() {
        this.isOpen = false;
        document.body.style.overflow = 'auto';
    },

    async performSearch() {
        const q = this.query.trim();
        if (q.length < 2) {
            this.results = [];
            return;
        }
        this.loading = true;
        try {
            const res = await fetch(`/api/buscar-productos?q=${encodeURIComponent(q)}`);
            const data = await res.json();
            this.results = data;
        } catch (e) {
            console.error('Search error:', e);
        } finally {
            this.loading = false;
        }
    }
});

Alpine.start();
