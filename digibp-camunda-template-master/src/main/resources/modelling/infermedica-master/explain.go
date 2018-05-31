package infermedica

import (
	"encoding/json"
	"net/http"
	"time"
)

type ExplainReq struct {
	Sex       Sex        `json:"sex"`
	Age       int        `json:"age"`
	Target    string     `json:"target"`
	Evidences []Evidence `json:"evidence"`
}

type ExplainRes struct {
	SupportingEvidence  []EvidenceItem `json:"supporting_evidence"`
	ConflictingEvidence []EvidenceItem `json:"conflicting_evidence"`
	UnconfirmedEvidence []EvidenceItem `json:"unconfirmed_evidence"`
}

type EvidenceItem struct {
	ID         string `json:"id"`
	Name       string `json:"name"`
	CommonName string `json:"common_name"`
}

func (a *App) Explain(er ExplainReq) (*ExplainRes, error) {
	req, err := a.prepareRequest("POST", "explain", er)
	if err != nil {
		return nil, err
	}
	client := &http.Client{
		Timeout: time.Second * 5,
	}
	res, err := client.Do(req)
	if err != nil {
		return nil, err
	}
	defer res.Body.Close()
	r := ExplainRes{}
	err = json.NewDecoder(res.Body).Decode(&r)
	if err != nil {
		return nil, err
	}
	return &r, nil
}
