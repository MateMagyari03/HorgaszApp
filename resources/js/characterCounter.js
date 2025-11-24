export class CharacterCounter {
    constructor(textareaId, maxLength = 500) {
        this.textarea = document.getElementById(textareaId);
        this.maxLength = maxLength;
        
        if (!this.textarea)
             {
            console.warn(`Textarea with id "${textareaId}" not found`);
            return;
        }

        this.init();
    }

    init() {
        this.counterElement = document.createElement('div');
        this.counterElement.className = 'text-xs text-slate-500 mt-1';
        this.counterElement.setAttribute('data-character-counter', this.textarea.id);
        this.textarea.parentNode.insertBefore(
            this.counterElement, 
            this.textarea.nextSibling
        );
        this.textarea.addEventListener('input', () => this.updateCounter());
        this.textarea.addEventListener('keyup', () => this.updateCounter());
        
        this.updateCounter();
    }

    updateCounter() {
        const currentLength = this.textarea.value.length;
        const remaining = this.maxLength - currentLength;
        const percentage = (currentLength / this.maxLength) * 100;


        let colorClass = 'text-slate-500';
        if (percentage >= 90) 
            {
            colorClass = 'text-red-500 font-semibold';
        } else if (percentage >= 70)
             {
            colorClass = 'text-amber-500';
        }

        this.counterElement.className = `text-xs ${colorClass} mt-1`;
        this.counterElement.textContent = `${currentLength} / ${this.maxLength} karakter`;
        
        if (currentLength > this.maxLength) {
            this.textarea.classList.add('border-red-500', 'ring-2', 'ring-red-200');
            this.textarea.classList.remove('border-slate-200');
        } else {
            this.textarea.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
            this.textarea.classList.add('border-slate-200');
        }
    }

    destroy() {
        if (this.counterElement && this.counterElement.parentNode) {
            this.counterElement.parentNode.removeChild(this.counterElement);
        }
    }
}

export function initCharacterCounters() {
    const init = () => {
        const textareas = document.querySelectorAll('textarea[data-max-length]');
        
        textareas.forEach(textarea => {

            if (textarea.parentNode.querySelector(`[data-character-counter="${textarea.id}"]`)) {
                return;
            }
            
            if (!textarea.id) 
                {
                textarea.id = `textarea-${Math.random().toString(36).substr(2, 9)}`;
            }
            
            const maxLength = parseInt(textarea.getAttribute('data-max-length')) || 500;
            new CharacterCounter(textarea.id, maxLength);
        });
    };

    if (document.readyState === 'loading')
         {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}

initCharacterCounters();







