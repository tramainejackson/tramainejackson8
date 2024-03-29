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
            '@makemysitemobile.com',
            '@needvirtualassistant.com',
            '@morelocalclients.net',
            '@weloantobusinesses.com',
            '@ercbusinesstaxcredits.com',
            '@homehealthresources.com',
            '@analysiswebsite.com',
            '.in.net',
            '2.83.51.s.b.9.xm@dynainbox.com',
            'agnessavolkova@seobomba.com',
            'ai-hustle',
            'alva.delacruz',
            'alspeersxmz7',
            'donayb7@sora5710.kaede39.officemail',
            'donelleej13ter@outlook.com',
            'frideamrik2@hotmail.com',
            'friend@tour-med.com',
            'c.h.a.r.med.c.rist.k.t.',
            'g.allan.ta.tta.ck.er.',
            'g.al.la.n.ta.t.tac.k.e.r',
            'gallant.a.tt.ac.k.e.r',
            'griskafishka234',
            'hunterlmx6347',
            'hvqsjdib',
            'info@needvirtualassistant.com',
            'julianamk18@hikaru3910.hiraku97.officemail',
            'kai.rus.sell009.8',
            'kai.russell009.8',
            'kostanboloyan',
            'lidam3regrundy',
            'm.g.l.e.n.en.k.o.tpa.nk.s.w.i.m.pu.l',
            'no-replywheva',
            'outreach@morelocalclients.net',
            'pozvonochnik.od.ua',
            'seller.amazon.web',
            's.c.ot.tr.o.b.bi.nsd.brm.5u.',
            'sc.ottro.b.b.ins.dbrm5.u.',
            'timofeeffsergey83',
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
            'intimate',
            'opt out',
            'https://tinyurl',
            'dating profile',
            'intimate photos',
            'makemysitemobile',
        ];

        foreach ($skip_emails as $email) {
            if(substr_count(strtolower($this->email), $email) > 0) {
                $funkyCheck = true;
                break;
            }
        }

        if($funkyCheck === false) {
            foreach ($skip_phrases as $phrase) {
                if((substr_count(strtolower($this->subject), $phrase) > 0) || (substr_count(strtolower($this->message), $phrase) > 0)) {
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
