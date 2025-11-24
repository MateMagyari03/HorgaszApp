
import { format, formatDistanceToNow, isPast, isFuture } from 'date-fns';

export class DateHelper {

    static formatDate(date, formatStr = 'yyyy.MM.dd') {
        if (!date) return '';
        
        try {
            const dateObj = typeof date === 'string' ? new Date(date) : date;
            return format(dateObj, formatStr);

        } catch (error) {
            console.error('Date formatting error:', error);
            return date;
            
        }
    }

    static formatRelative(date) {
        if (!date) return '';
        
        try {

            const dateObj = typeof date === 'string' ? new Date(date) : date;
            return formatDistanceToNow(dateObj, { 
                addSuffix: true
            });

        } catch (error) 
        {
            console.error('Relative date formatting error:', error);
            return date;
        }
    }

    static isPast(date) {
        if (!date) return false;
        
        try {

            const dateObj = typeof date === 'string' ? new Date(date) : date;
            return isPast(dateObj);

        } catch (error) 
        {
            console.error('Date check error:', error);
            return false;
        }
    }

    static isFuture(date) {
        if (!date) return false;

        
        try {

            const dateObj = typeof date === 'string' ? new Date(date) : date;
            return isFuture(dateObj);
        } catch (error) {
            console.error('Date check error:', error);
            return false;
        }
    }

    static formatLong(date) {
        return this.formatDate(date, 'yyyy. MMMM d.');
    }
}

window.DateHelper = DateHelper;