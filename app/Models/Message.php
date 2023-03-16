<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * Create full name accessor
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Get the consult request record associated with the user.
     */
    public function consultContact()
    {
        return $this->hasOne('App\ConsultContact');
    }

    /**
     * Get the consult request record associated with the user.
     */
    public function consultResponse()
    {
        return $this->hasOne('App\ConsultResponse');
    }

    /**
     * Check the message for funkyness
     */
    public function funkyCheck()
    {
        $funkyCheck = false;

        $skip_emails = [
            '@course-fitness.com',
            '2.83.51.s.b.9.xm@dynainbox.com',
            'alspeersxmz7@outlook.com',
            'info@needvirtualassistant.com',
            'outreach@morelocalclients.net',
            'no-replywheva@gmail.com',
            'donayb7@sora5710.kaede39.officemail.in.net',
            'donelleej13ter@outlook.com',
            'frideamrik2@hotmail.com',
            'friend@tour-med.com',
            'c.h.a.r.med.c.rist.k.t.@gmail.com',
            'g.allan.ta.tta.ck.er.@gmail.com',
            'g.al.la.n.ta.t.tac.k.e.r@gmail.com',
            'gallant.a.tt.ac.k.e.r@gmail.com',
            'griskafishka234@gmail.com',
            'hunterlmx6347@gmail.com',
            'hvqsjdib@gmail.com',
            'julianamk18@hikaru3910.hiraku97.officemail.in.net',
            'kai.rus.sell009.8@gmail.com',
            'kai.russell009.8@gmail.com',
            'kostanboloyan@gmail.com',
            'lidam3regrundy@outlook.com',
            'pozvonochnik.od.ua@gmail.com',
            'seller.amazon.web@gmail.com',
            's.c.ot.tr.o.b.bi.nsd.brm.5u.@gmail.com',
            'sc.ottro.b.b.ins.dbrm5.u.@gmail.com',
            'timofeeffsergey83@gmail.com',
            'webmaster@gameplayin.net',
            'zelatcol@gmail.com',
        ];
        $skip_phrases = [
            'porn',
            'galleries',
            'teens',
            'pussy',
            'sexy',
            'sex',
            'lose weight',
            'attention',
            'child',
            'robot',
            'make money',
            'increase your financial',
            'earn additional money',
            'erection',
            'fuck',
            'playmate',
            'nude',
            'naked',
            'need cash',
            'need money',
            'seduction',
            'seduce',
        ];

        foreach ($skip_emails as $email) {
            if(substr_count($this->email, $email) > 0) {
                $funkyCheck = true;
                break;
            }
        }

        if($funkyCheck === false) {
            foreach ($skip_phrases as $phrase) {
                if((substr_count($this->subject, $phrase) > 0) || (substr_count($this->message, $phrase) > 0)) {
                    $funkyCheck = true;
                    break;
                }
            }
        }

        return $funkyCheck;
    }

    /**
     * Scope a query to only include most recent consult request
     * that hasn't been responded to yet.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLeastRecent($query)
    {
        return $query->where('responded', '=', 'N')
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
